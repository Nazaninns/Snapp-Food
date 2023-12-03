<?php

namespace App\Http\Requests\api\comment;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
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
            'order_id' => ['required', 'numeric', 'exists:orders,id'],
            'score' => ['required', 'numeric', 'between:1,5'],
            'text' => ['required', 'string','between:3,200']
        ];
    }
}
