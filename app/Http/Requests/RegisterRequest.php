<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name'=>['required','string','between:3,15'],
            'email'=>['required','email','unique:users'],
            'phone' => ['required', 'string', 'regex:/^09[0|1|2|3][0-9]{8}$/'],
            'password' => [Password::default()->mixedCase()->numbers()]
        ];
    }
}
