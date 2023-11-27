<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class DateRequest extends FormRequest
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
            'from'=>['required_with:to','nullable','date','before_or_equal:'.now()->toDateString()],
            'to'=>['required_with:from','nullable','date','before_or_equal:'.now()->toDateString()]
        ];
    }
}
