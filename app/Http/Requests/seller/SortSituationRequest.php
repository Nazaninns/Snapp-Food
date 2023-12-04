<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class SortSituationRequest extends FormRequest
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
            'situation' => ['nullable', 'in:pending,making,send'],
            'paginate' => ['numeric', 'between:1,20']
        ];
    }
}
