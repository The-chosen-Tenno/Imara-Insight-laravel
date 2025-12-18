<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectTagRequest extends FormRequest
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
            'ProjectTag' => 'required|array|min:1',
            'ProjectTag.*.project_id' => 'required|integer|exists:projects,id',
            'ProjectTag.*.name' => 'sometimes',
            'ProjectTag.*.tag_id' => 'sometimes'
        ];
    }
}
