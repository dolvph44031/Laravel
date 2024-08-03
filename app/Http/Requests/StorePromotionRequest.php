<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'code' => 'required|string|size:9|unique:promotions',
            'description' => 'nullable|string',
            'discount_amount' => 'required|numeric|min:0',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tên khuyến mãi không được bỏ trống',
            'code.required' => 'Mã khuyến mãi không được bỏ trống',
            'code.size' => 'Mã khuyến mãi phải có 9 ký tự',
            'code.unique' => 'Mã khuyến mãi đã tồn tại',
            'discount_amount.required' => 'Số tiền giảm không được bỏ trống',
            'discount_amount.numeric' => 'Số tiền giảm phải là số',
            'start_date.required' => 'Ngày bắt đầu không được bỏ trống',
            'end_date.required' => 'Ngày kết thúc không được bỏ trống',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
        ];
    }
}
