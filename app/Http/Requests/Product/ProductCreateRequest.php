<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            "name" => "bail|required|min:2|max:100",
            "price" => "bail|required|numeric|gte:1",
            "discount" => "bail|numeric|gte:0|lte:price",
        ];
    }
}
