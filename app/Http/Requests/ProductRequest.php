<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'status'=>'nullable',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image'=>'nullable|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
            'category_id'=>'required',
        ];
    }
}
