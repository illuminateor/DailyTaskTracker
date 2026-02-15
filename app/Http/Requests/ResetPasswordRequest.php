<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
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
            'token' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()]
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter your valid email address.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
