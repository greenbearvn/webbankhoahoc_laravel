<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'Email' => 'required|email:rfc,dns|unique:Email',
            'TenNguoiDung' => 'required|unique:TenNguoiDung',
            'MatKhau' => 'required|min:8',
            'password_confirmation' => 'required|same:MatKhau'
        ];
    }
}
