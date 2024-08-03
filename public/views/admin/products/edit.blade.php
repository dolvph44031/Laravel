@extends('admin.layouts.master')

@section('title')
    Chỉnh sửa sản phẩm
@endsection
@section('style-libs')
    <link href="{{asset('theme/admin/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('script-libs')
    <script src="{{asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
    <script src="{{asset('theme/admin/libs/dropzone/dropzone-min.js')}}"></script>
    <script src="{{asset('theme/admin/js/edit-product.init.js')}}"></script>
@endsection
@section('content')
<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <!--   Left content-->
        <div class="col-xl-8 col-lg-7">
            <!-- Product Information Card -->
            <div class="card shadow mb-4">
                <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
                </a>
                <div class="collapse show" id="collapseProductInfo">
                    <div class="card-body">
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="product-title-input" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="product-title-input" placeholder="Tên sản phẩm"
                                   name="name" value="{{ old('name', $product->name) }}">
                        </div>
                        <!-- Product Price -->
                        <div class="mb-3">
                            <label for="product-price-input" class="form-label">Giá</label>
                            <input type="text" class="form-control" id="product-price-input" placeholder="Giá sản phẩm"
                                   name="price" value="{{ old('price', $product->price) }}">
                        </div>
                        <!-- Product Sale Price -->
                        <div class="mb-3">
                            <label for="product-sale-price-input" class="form-label">Giá sale</label>
                            <input type="text" class="form-control" id="product-sale-price-input" placeholder="Giá giảm"
                                   name="price_sale" value="{{ old('price_sale', $product->price_sale) }}">
                        </div>
                        <!-- Product Description -->
                        <div class="mb-3">
                            <label class="form-label">Mô tả sản phẩm</label><br>
                            <textarea id="ckeditor-classic" class="form-control" name="description">{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Gallery Card -->
            <div class="card shadow mb-4">
                <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Ảnh sản phẩm</h6>
                </a>
                <div class="collapse show" id="collapseProductGallery">
                    <div class="card-body">
                        <!-- Thumbnail Image -->
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Ảnh sản phẩm</h5>
                            <p class="text-muted">Thêm ảnh sản phẩm</p>
                            <input type="file" name="img_thumb" class="form-control">
                            @if ($product->img_thumb)
                                <img src="{{ Storage::url($product->img_thumb) }}" alt="{{ $product->name }}" width="70px" height="70px">
                            @endif
                        </div>
                        <!-- Product Gallery -->
                        <div>
                            <h5 class="fs-14 mb-1">Thư viện ảnh</h5>
                            <p class="text-muted">Thêm thư viện ảnh sản phẩm</p>
                            <input type="file" name="product_galleries[]" multiple class="form-control">
                            @foreach($product->galleries as $gallery)
                                <img src="{{ Storage::url($gallery->image) }}" width="70px" height="70px">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Variants -->
            <div class="card shadow mb-4">
                <a href="#collapseProductVariants" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Biến thể sản phẩm</h6>
                </a>
                <div class="collapse show" id="collapseProductVariants">
                    <div class="card-body">
                        <div class="mb-4">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Size</th>
                                    <th>Màu</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($product->variants as $variant)
                                        <tr>
                                            <!-- Hidden field for variant ID -->
                                            <input type="hidden" name="product_variants[{{ $loop->index }}][id]" value="{{ $variant->id }}">

                                            <!-- Size Selection -->
                                            <td>
                                                <select name="product_variants[{{ $loop->index }}][size]" class="form-control">
                                                    @foreach($sizes as $size_id => $size_name)
                                                        <option value="{{$size_id}}" {{ $variant->product_size_id == $size_id ? 'selected' : '' }}>{{$size_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <!-- Color Selection -->
                                            <td>
                                                <select name="product_variants[{{ $loop->index }}][color]" class="form-control">
                                                    @foreach($colors as $color_id => $color_name)
                                                        <option value="{{$color_id}}" {{ $variant->product_color_id == $color_id ? 'selected' : '' }}>{{$color_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <!-- Image Upload -->
                                            <td>
                                                <input type="file" name="product_variants[{{ $loop->index }}][image]" class="form-control">
                                                @if ($variant->image)
                                                    <img src="{{ Storage::url($variant->image) }}" alt="{{ $product->name }}" class="" width="70px" height="70px">
                                                @endif
                                            </td>

                                            <!-- Quantity Input -->
                                            <td>
                                                <input type="text" name="product_variants[{{ $loop->index }}][quantity]" class="form-control" value="{{ $variant->quantity }}">
                                            </td>

                                            <!-- Price Input -->
                                            <td>
                                                <input type="text" name="product_variants[{{ $loop->index }}][price]" class="form-control" value="{{ $variant->price }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button class="btn btn-info">Thêm biến thể</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-success w-sm">Submit</button>
            </div>
        </div>
        <!-- End left content -->

        <!-- Right content -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <a href="#collapseStatus" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Trạng thái sản phẩm</h6>
                </a>
                <div class="collapse show" id="collapseStatus">
                    <div class="card-body">
                        <!-- Category Selection -->
                        <label for="choices-category-input" class="form-label">Danh mục sản phẩm</label>
                        <select class="form-control" aria-label="Default select example"
                                id="choices-category-input" name="category_id">
                            @foreach($categories as $id => $name)
                                <option value="{{$id}}" {{ $product->category_id == $id ? 'selected' : '' }}>{{$name}}</option>
                            @endforeach
                        </select>

                        <!-- Status Selection -->
                        <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
<select class="form-control form-select-lg mb-3" id="choices-publish-status-input"
        aria-label="Default select example" name="is_active">
    <option value="1" {{ old('status', $product->is_active) == 1 ? 'selected' : '' }}>Hoạt động</option>
    <option value="0" {{ old('status', $product->is_active) == 0 ? 'selected' : '' }}>Không hoạt động</option>
</select>


                        <!-- Product Types -->
                        @php
                            $types = [
                                'is_best_sale' => 'Bán chạy',
                                'is_40_sale' => 'Giảm 40%',
                                'is_hot_online' => 'Hot online',
                            ];
                        @endphp
                        <label for="choices-publish-type-input" class="form-label">Loại sản phẩm</label>
                        <div class="d-flex align-items-center">
                            @foreach($types as $key => $value)
                                <div class="form-group custom-control custom-checkbox small col-md-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck-{{$key}}"
                                           name="{{$key}}" {{ $product->$key ? 'checked' : '' }}>
                                    <label for="customCheck-{{$key}}" class="custom-control-label">{{$value}}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- SKU Input -->
                        <label for="choices-publish-type-input" class="form-label">Mã sản phẩm</label>
                        <input type="text" class="form-control" name="sku" value="{{ old('sku', $product->sku) }}">
                    </div>
                </div>
            </div>
        </div>
        <!-- End right content -->
    </div>
</form>

@endsection
