<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthFormRequest extends FormRequest
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
            [
                'name' => ['required', 'max:20'],
                'email' => ['required', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|min:8',
            ], [
                'name.max' => "Not more than 20 characters.",
                'email' => "Your email has already registered.",
                'password.min' => "Not less than 8 characters.",
                'password.confirmed' => "Something's wrong",
            ]
        ];
    }
}
