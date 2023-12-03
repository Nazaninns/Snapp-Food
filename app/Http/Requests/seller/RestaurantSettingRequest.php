<?php

namespace App\Http\Requests\seller;

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
            'name' => [ 'string','max:100'],
            'phone' => [ 'string', new PhoneRule()],
            'address' => [ 'string','max:200'],
            'type' => [ 'array'],
            'latitude'=>['decimal:2,4'],
            'longitude'=>['decimal:2,4'],
            'delivery_cost'=>['required','numeric','max:300'],
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
