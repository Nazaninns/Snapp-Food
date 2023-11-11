<?php

namespace App\Http\Requests\api\address;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'title' => ['string','between:3,100'],
            'address' => ['string','between:3,200'],
            'latitude' => ['decimal:2,4'],
            'longitude' => ['decimal:2,4'],
        ];
    }
}
