<?php

namespace App\Http\Requests;

use App\Enums\Users\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateUserRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:50',
            'email' => ['sometimes', 'required', 'string', 'email', 'max:50',
                Rule::unique('users', 'email')->ignore($this->user)],
            'role' => ['sometimes', 'required', new Enum(Role::class)]
        ];
    }
}
