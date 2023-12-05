<?php

namespace App\Http\Requests\api\restaurant;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'is_open' => ['boolean'],
            'type' => ['string','max:50'],
            'score_gt' => ['numeric', 'between:1,5']
        ];
    }
}
