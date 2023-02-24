<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'من فضلك ادخل الاسم',
            'email.required' => 'من فضلك ادخل الايميل',
            'phone.required' => 'من فضلك ادخل رقم الهاتف',
        ];
    }
}
