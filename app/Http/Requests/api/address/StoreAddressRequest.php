<?php

namespace App\Http\Requests\api\address;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'title' => ['required', 'string','between:3,100'],
            'address' => ['required', 'string','between:3,200'],
            'latitude' => ['required', 'decimal:2'],
            'longitude' => ['required', 'decimal:2']
        ];
    }
}
