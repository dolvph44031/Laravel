<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Log;

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->with(['category'])->latest('id')->get();
        //        dd($data->first()->category);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Lấy dữ liệu sản phẩm từ request
        $data = $request->except(['product_variants', 'img_thumb', 'product_galleries']);
        $data['is_best_sale'] = isset($data['is_best_sale']) ? 1 : 0;
        $data['is_40_sale'] = isset($data['is_40_sale']) ? 1 : 0;
        $data['is_hot_online'] = isset($data['is_hot_online']) ? 1 : 0;
        $data['slug'] = Str::slug($data['name'] . '-' . $data['sku']);
    
        if ($request->hasFile('img_thumb')) {
            $data['img_thumb'] = Storage::put('products', $request->file('img_thumb'));
        }
    
        try {
            DB::beginTransaction();
    
            // Tạo sản phẩm mới
            $product = Product::query()->create($data);
    
            // Tạo các biến thể sản phẩm
            foreach ($request->product_variants as $item) {
                ProductVariant::query()->create([
                    'product_size_id' => $item['size'],
                    'product_color_id' => $item['color'],
                    'image' => !empty($item['image']) ? Storage::put('product_variants', $item['image']) : '',
                    'quantity' => isset($item['quantity']) ? (int)$item['quantity'] : 0, // Chuyển đổi thành số nguyên
                    'price' => isset($item['price']) ? (float)$item['price'] : 0, // Chuyển đổi thành số thực
                    'product_id' => $product->id,
                ]);
            }
    
            // Tạo thư viện ảnh sản phẩm
            foreach ($request->product_galleries as $item) {
                ProductGallery::query()->create([
                    'image' => Storage::put('product_galleries', $item),
                    'product_id' => $product->id,
                ]);
            }
    
            DB::commit();
            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
    
            // Xóa ảnh trong storage nếu có lỗi
            foreach ($request->product_variants as $item) {
                if (!empty($item['image'])) {
                    Storage::delete($item['image']);
                }
            }
            foreach ($request->product_galleries as $item) {
                Storage::delete($item);
            }
            return back()->withErrors(['error' => 'Đã xảy ra lỗi khi tạo sản phẩm: ' . $exception->getMessage()]);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Load product variants and galleries relationships
        $product->load(['variants.size', 'variants.color', 'galleries']);

        // Fetch categories, sizes, and colors for display
        $categories = Category::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();

        // Pass the data to the view
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'categories', 'sizes', 'colors'));
    }




    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Product $product)
    {
        // Fetch the necessary data for the edit view
        $categories = Category::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();

        // Pass the data to the view
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'categories', 'sizes', 'colors'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Validate the request data
        $data = $request->except(['product_variants', 'img_thumb', 'product_galleries']);
        $data['is_best_sale'] = isset($data['is_best_sale']) ? 1 : 0;
        $data['is_40_sale'] = isset($data['is_40_sale']) ? 1 : 0;
        $data['is_hot_online'] = isset($data['is_hot_online']) ? 1 : 0;
        $data['slug'] = Str::slug($data['name'] . '-' . $data['sku']);

        try {
            DB::beginTransaction();

            // Update the product's basic information
            $product->update($data);

            // Update the thumbnail image if provided
            if ($request->hasFile('img_thumb')) {
                // Delete old thumbnail if it exists
                if (Storage::exists($product->img_thumb)) {
                    Storage::delete($product->img_thumb);
                }

                // Store new thumbnail
                $product->img_thumb = Storage::put('products', $request->file('img_thumb'));
                $product->save();
            }

            // Update or create product variants
            if ($request->has('product_variants')) {
                foreach ($request->product_variants as $item) {
                    // Check if a file is uploaded for the variant image
                    if (isset($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $item['image'] = Storage::put('product_variants', $item['image']);
                    } else {
                        // Keep the old image if no new image is uploaded
                        $existingVariant = ProductVariant::find($item['id']);
                        if ($existingVariant) {
                            $item['image'] = $existingVariant->image;
                        }
                    }

                    ProductVariant::updateOrCreate(
                        [
                            'id' => $item['id'] ?? null, // assuming id is provided if updating existing variants
                        ],
                        [
                            'product_size_id' => $item['size'],
                            'product_color_id' => $item['color'],
                            'image' => $item['image'] ?? null,
                            'quantity' => $item['quantity'] ?? 0,
                            'price' => $item['price'] ?? 0,
                            'product_id' => $product->id,
                        ]
                    );
                }
            }

            // Update or create product galleries
            if ($request->has('product_galleries')) {
                foreach ($request->product_galleries as $item) {
                    ProductGallery::create([
                        'image' => Storage::put('product_galleries', $item),
                        'product_id' => $product->id,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $exception) {
            DB::rollBack();

            // Log the error message
            // \Log::error('Error updating product: ' . $exception->getMessage());

            return back()->with('error', 'There was a problem updating the product. Please try again later.');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();

            // Xóa các ảnh trong thư viện sản phẩm
            foreach ($product->galleries as $gallery) {
                Storage::delete($gallery->image); // Xóa ảnh khỏi hệ thống lưu trữ
                $gallery->delete(); // Xóa bản ghi thư viện ảnh
            }

            // Xóa các biến thể sản phẩm
            $product->variants()->delete();

            // Xóa sản phẩm
            $product->delete();

            DB::commit();
            return redirect()->route('admin.products.index')->with('message', 'Sản phẩm đã được xóa thành công.');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Đã xảy ra lỗi khi xóa sản phẩm.']);
        }
    }
}
