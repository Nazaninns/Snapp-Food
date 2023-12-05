<?php

namespace App\Http\Requests\seller;

use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class ResturantProfileRequest extends FormRequest
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
    public function passedValidation()
    {
//        $validated=$this->validated();
//        $validated['user_id']=Auth::id();
//        $restaurant=Restaurant::query()->create($validated);
        //$restaurant = (new Restaurant())->save();
        //dd($restaurant);
        //$restaurant->restaurantCategories()->sync($this['type']);
//       return $restaurant->restaurantCategories()->sync($this->type);
        // dd($this->type);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'phone' => ['string', 'required', new PhoneRule()],
            'address' => ['string', 'required'],
            'latitude'=>['required','decimal:2,4'],
            'longitude'=>['required','decimal:2,4'],
            'account_number' => ['required', 'string'],
            'delivery_cost'=>['required','numeric','between:1,400'],
            'type' => ['required', 'array']
        ];
    }
}
