<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest extends FormRequest
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
            'name'    => ['required', 'max:191'],
            'email'   => ['nullable', 'email', 'max:191'],
            'address' => ['nullable', 'max:191'],
            'phone'   => ['nullable', 'max:11'],
        ];
    }

    public function messages()
    {   
        return [
            'name.required' => 'Tên nhà cung cấp không được để trống.',
            'name.max'      => 'Không được vượt quá 191 ký tự',
            'email.email'   => 'Bạn cần nhập đúng định dạng email',
            'email.max'     => 'Không được vượt quá 191 ký tự',
            'address.max'   => 'Không được vượt quá 191 ký tự',
            'phone.max'     => 'Không được vượt quá 11 ký tự',
        ];

    }
}
