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
            'user_id' => 'required|integer|exists:users,id',
            'project_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_type' => 'required|string|in:coding,automation',
            'status' => 'required|string|in:started,in_progress,idle,finished,cancelled'
        ];
    }
}
