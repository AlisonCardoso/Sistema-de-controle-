<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [


                    'name' => 'required',
                    'username' => 'required',
                    'cpf' => 'required| string|max:15',

                    'email' => 'required|email|unique:users',
                    'photo' => 'mimes:png,jpeg,jpg|max:2048',
        ];
    }
}
