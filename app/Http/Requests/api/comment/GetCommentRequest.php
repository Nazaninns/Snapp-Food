<?php

namespace App\Http\Requests\api\comment;

use Illuminate\Foundation\Http\FormRequest;

class GetCommentRequest extends FormRequest
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
            'restaurant_id' => ['required_without:food_id','prohibits:food_id', 'numeric', 'exists:restaurants,id'],
            'food_id' => ['required_without:restaurant_id', 'numeric', 'exists:food,id']
        ];
    }
}
