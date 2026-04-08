<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'string', 'in:todo,in_progress,done'],
            'due_date'    => ['required', 'string', 'date_format:Y-m-d', 'after_or_equal:today'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'          => 'A task title is required.',
            'title.min'               => 'The title must be at least 3 characters.',
            'title.max'               => 'The title may not exceed 255 characters.',

            'description.max'               => 'The description may not exceed 2000 characters.',

            'status.required' => 'Please select a status.',
            'status.in'       => 'Status must be To Do, In Progress or Done.',

            'due_date.required'          => 'The due date is required.',
            'due_date.date_format'    => 'The due date must be in YYYY-MM-DD format.',
            'due_date.after_or_equal' => 'The due date cannot be in the past.',
        ];
    }
}
