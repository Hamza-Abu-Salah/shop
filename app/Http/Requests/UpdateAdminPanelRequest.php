<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminPanelRequest extends FormRequest
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
            'system_name'=>'required',
            'phone'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'system_name.required'=>'من فضلك ادخل اسم الشركة',
            'phone.required'=>'من فضلك ادخل رقم الهاتف',
        ];
    }

}
