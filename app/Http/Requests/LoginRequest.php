<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'user_name' => ['required', 'max:20', 'min:4'],
            'password'  => ['required', 'min:8'],
        ];
    }

    public function messages() {
        return [
            'user_name.required' => 'Tên đăng nhập không được để trống',
            'user_name.max'      => 'Tên đăng nhập không thể quá dài',
            'user_name.min'      => 'Tên đăng nhập phải có nhiều hơn 4 ký tự',
            'password.required'  => 'Bạn cần nhập vào mật khẩu',
            'password.min'       => 'Mật khẩu phải dài hơn 8 ký tự',
        
        ];
    }
}
