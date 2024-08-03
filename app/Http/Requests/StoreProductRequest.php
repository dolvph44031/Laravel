<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'name' => 'required',
            // 'price' => 'required',
            // 'price_sale' => 'required',
            // 'img_thumb' => 'required',
            // 'description' => 'required',
            // 'is_best_sale' => 'required',
            // 'is_active' => 'required',
            // 'is_40_sale' => 'required|boolean',
            // 'is_hot_online' => 'required|boolean',
            // 'product_variants' => 'array',
            // 'product_variants.*.size' => 'required|exists:product_sizes,id',
            // 'product_variants.*.color' => 'required|exists:product_colors,id',
            // 'product_variants.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'product_variants.*.quantity' => 'required|integer|min:0',
            // 'product_variants.*.price' => 'required|numeric|min:0',
            // 'product_galleries.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'category_id' => 'required|exists:categories,id',
        ];
    }
    /**
     * Xác định các thông báo lỗi xác thực.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'name.required' => 'Tên không được bỏ trống',
            // 'price.required' => 'Tên không được bỏ trống',
            // 'sku.required' => 'Tên không được bỏ trống',
            // 'img_thumb.required' => 'Ảnh không được bỏ trống',
            // 'description.required' => 'Mô tả không được bỏ trống',
            // 'is_active.required' => 'Ảnh không được bỏ trống',
            // 'category_id.required' => 'Tên không được bỏ trống',
            // 'is_best_sale.required' => 'Tên không được bỏ trống',
            // 'is_40_sale.required' => 'Tên không được bỏ trống',
            // 'product_variants.*.quantity' => 'Số lượng không được bỏ trống',
            // 'product_variants.*.price' => 'Số lượng không được bỏ trống',
            // 'product_variants.*.size.exists' => 'Kích thước sản phẩm không tồn tại.',
            // 'product_variants.*.color.exists' => 'Màu sắc sản phẩm không tồn tại.',
            // 'product_galleries.*.required' => 'Hình ảnh phải là định dạng ảnh hợp lệ.',
            // 'product_galleries.*.image' => 'Hình ảnh phải là định dạng ảnh hợp lệ.',
        ];
    }
}
