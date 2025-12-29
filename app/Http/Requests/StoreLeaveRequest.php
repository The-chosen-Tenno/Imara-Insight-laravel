<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeaveRequest extends FormRequest
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
            'reason_type' => 'required|string|in:annual,casual,medical',
            'description' => 'sometimes|string',
            'leave_duration' => 'required|in:full,half,multi',
            'half_day' => 'sometimes|in:first,second',
            'start_date' => 'required|date',
            'end_date' => 'sometimes|date'
        ];
    }
    public function messages(): array
    {
        return [
            'reason_type.required' => 'Reason type is required',
            'reason_type.string' => 'Reason type must be string',
            'reason_type.in' => 'Invalid reason type value',

            'description.string' => 'Description must be string',

            'leave_duration.required' => 'Leave duration is required',
            'leave_duration.in' => 'Invalid leave duration value',

            'half_day.in' => 'Invalid half day value',

            'start_date.required' => 'Start date is required',
            'start_date.date' => 'Start date must be a date',

            'end_date.date' => 'End date must be a date'
        ];
    }
}
