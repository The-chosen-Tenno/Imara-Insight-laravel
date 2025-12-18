<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProjectTagRequest extends FormRequest
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
            "DeleteTag" => "required|array|min:1",
            "DeleteTag.*.project_id" => "required|integer|exists:projects,id",
            "DeleteTag.*.tag_id" => "required|array|min:1",
            "DeleteTag.*.tag_id.*" => "integer|exists:tags,id",
        ];
    }
}
