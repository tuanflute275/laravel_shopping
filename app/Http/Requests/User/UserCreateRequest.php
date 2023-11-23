<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            "image" => "bail|required|mimes:png,jpg,jpeg,jfif,webp",
            'name' => 'bail|required|min:3|max:100|',
            'email' => 'bail|required|email|min:5|unique:users,email',
            'password' => 'bail|required|min:6|max:20|confirmed:password_confirmation',
        ];
    }
}
