<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:100',
            'users_id' => 'required|exists:users,id', //harus ada user nya siapa
            'categories_id' => 'required|exists:categories,id', // saat milih kategori, kategorinya harus ada 
            'price' => 'required|integer',
            'description' => 'required',
            'stock' => 'required|min:0',
            'tags' => 'required',
        ];
    }
}
