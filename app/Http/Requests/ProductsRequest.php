<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
                'name'        => ['required', 'max:191'],
                'category_id' => ['required'],
                'price'       => ['required', 'numeric'],
                'sale'        => ['nullable', 'numeric'],
                'total'       => ['required', 'numeric'],
                'image'       => ['required', 'image'],
            ];
    }

    public function messages() {
        return [
            'name.required'        => 'Bạn cần nhập vào tên sản phẩm',
            'name.max'             => 'Tên sản phẩm không được vượt quá 191 ký tự',
            'category_id.required' => 'Danh mục sản phẩm không thể để trống',
            'price.required'       => 'Giá sản phẩm không được để trống',
            'price.numeric'        => 'Giá sản phẩm phải ở định dạng số',
            'sale.numeric'         => 'Giảm giá sản phẩm phải ở định dạng số',
            'total.numeric'        => 'Tổng số sản phẩm phải ở định dạng số',
            'total.required'       => 'Tổng số sản phẩm không được để trống',
            'image.required'       => 'Bạn cần chọn ảnh mô tả sản phẩm',
            'image.image'          => 'Ảnh sản phẩm không thuộc định dạng cho phép',
        ];
    }
}
