<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        // dd('validate');
        return [
            'name'=> 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'image'=>'nullable|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
            'status'=> 'required|boolean',
            'role'=>'required|integer|exists:roles,id'

        ];
    }

}
