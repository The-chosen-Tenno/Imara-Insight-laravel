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
            'full_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:20|unique:users,user_name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Full name is required',
            'full_name.string' => 'Full name has to be string',
            'full_name.max' => 'Name is too big',

            'user_name.required' => 'User name is required',
            'user_name.string' => 'User name has to be string',
            'user_name.max' => 'User name is too big',
            'user_name.unique' => 'User name must be unique',

            'email.required' => 'Email is required',
            'email.email' => 'Invalid Format',
            'email.unique' => 'Email must be unique',

            'password.required' => 'Password is required',
            'password.string' => 'Password must be string',
            'password.min' => 'Password is too short'
        ];
    }
}
