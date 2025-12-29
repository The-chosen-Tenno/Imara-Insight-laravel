<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            // 'user_id' => 'required|integer|exists:users,id',
            'project_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_type' => 'required|string|in:coding,automation',
            'status' => 'sometimes|string|in:started,in_progress,idle,finished,cancelled'
        ];
    }

    public function messages(): array
    {
        return [
            // 'user_id.required' => 'User id is missing',
            // 'user_id.integer' => 'User id has to be a number',
            // 'user_id.exists' => 'No user found',

            'project_name.required' => 'Project name is missing',
            'project_name.string' => 'Project name has to be string',
            'project_name.max' => 'Project name is too big',

            'project_type.required' => 'Project type is missing',
            'project_type.in' => 'Invalid type value',
            'status.in' => 'Invalid status value'
        ];
    }
}
