<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
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
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 50 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'priority.required' => 'The priority field is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.min' => 'The priority must be at least 1.',
            'priority.max' => 'The priority may not be greater than 10.',
        ];
    }
}
