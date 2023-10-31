<?php

namespace App\Http\Requests;

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
            'name'=>['required','string'],
            //'type'=>['integer','required'],
            'phone'=>['string','required'],
            'address'=>['string','required'],
            'image'=>['string','required'],
            'delivery'=>['integer','required'],
            'open_close'=>['boolean','required'],
        ];
    }
}
