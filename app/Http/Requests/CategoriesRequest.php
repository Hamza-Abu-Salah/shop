<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
         'name'=>'required',
         'content'=>'required',
         'image'=>'required',

        ];
    }

    public function messages()
    {
        return [
        'name.required'=>'يرجى منك تعبئة هادا الحقل',
        'content.required'=>'يرجى منك تعبئة هادا الحقل',
        'image.required'=>'يرجى منك تعبئة هادا الحقل',

        ];
    }
}
