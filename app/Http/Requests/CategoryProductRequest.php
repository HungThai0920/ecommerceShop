<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryProductRequest extends FormRequest
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
            'name'      => 'required|max:191|unique:category_product,name,'.$this->id,
            'orders'    => ['required'],
        ];
    }

    public function messages()
    {   
        return [
            'name.required'   => 'Tên danh mục không được để trống.',
            'name.max'        => 'Không được vượt quá 191 ký tự',
            'name.unique'     => 'Tên danh mục không được trùng',
            'orders.required' => 'Thứ tự hiển thị không được để trống',

        ];
    }
}
