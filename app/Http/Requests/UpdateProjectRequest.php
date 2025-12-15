<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        return
            [
                'user_id' => 'sometimes|numeric|exists:users,id',
                'project_name' => 'sometimes|string|max:255',
                'description' => 'sometimes|string|nullable',
                'project_type' => 'sometimes|string|in:coding,automation,others',
                'status' => 'sometimes|string|in:started,in_progress,idle,finished,cancelled'
            ];
    }
    public function messages(): array
    {
        return
            [
                'project_name.max' => 'Project Name is Too Big',
                'project_type.in' => 'Invalid Type Value',
                'status.in' => 'Invalid Status Value'
            ];
    }
}
