<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title'       => ['required'],
            'cate_new_id' => ['required'],
        ];
    }

    public function messages() {
        return [
            'title.required'       => 'Bạn cần nhập vào tiêu đề bài viết',
            'cate_new_id.required' => 'Bạn cần chọn danh mục bài viết ',

        ];
    }
}
