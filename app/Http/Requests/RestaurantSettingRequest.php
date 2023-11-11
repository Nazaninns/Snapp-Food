<?php

namespace App\Http\Requests;

use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class RestaurantSettingRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'phone' => ['required', 'string', new PhoneRule()],
            'address' => ['required', 'string'],
            'type' => ['required', 'array'],
            //'image'=>['string','required'],
            //'delivery'=>['integer','required'],
            //'open_close'=>['boolean','required'],
            // ----
            // 'start_time' => ['required' , 'string'],
            // 'end_time' => ['required' , 'string'],
            // 'shipping_cost' =>['required','numeric']
        ];
    }
}
