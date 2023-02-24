<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
         'title'=>'required',
         'content'=>'required',
         'text_btn'=>'required',
         'price'=>'required',
         'categories_id'=>'required',

        ];
    }

    public function messages()
    {
        return [
        'title.required'=>'يرجى منك تعبئة هادا الحقل',
        'content.required'=>'يرجى منك تعبئة هادا الحقل',
        'text_btn.required'=>'يرجى منك تعبئة هادا الحقل',
        'price.required'=>'يرجى منك تعبئة هادا الحقل',
        'categories_id.required'=>'يرجى منك تعبئة هادا الحقل',

        ];
    }
}
