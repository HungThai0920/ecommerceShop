<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidesRequest extends FormRequest
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
            //
            'name' =>'required|max:191',
            'sort' => 'required',
            'imgs' => 'required|image|max:2048',
            
        ];
    }

     public function messages()
    {   
        return [
            'sort.required' => 'Nhập vào thứ tự hiển thị',
            'name.required'  => 'Tên slide không được để trống.',
            'name.max'       => 'Không được vượt quá 191 ký tự',
            'imgs.required' => 'File ảnh không được để trống',
            'imgs.image'    => 'Bạn cần chọn đúng fie có định dạng ảnh',
            'imgs.max'      => 'Định dạng file quá lớn',
            

        ];
    }
}
