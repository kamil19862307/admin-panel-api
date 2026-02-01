<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        if ($this->method() === 'PUT') {
            return [
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'body' => 'required|string|max:10000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ];

        } else {
            return [
                'title' => 'sometimes|required|string|max:255',
                'slug' => 'sometimes|required|string|max:255',
                'body' => 'sometimes|required|string|max:10000',
                'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ];
        }
    }
}
