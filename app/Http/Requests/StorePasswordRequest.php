<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasswordRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'old_password.required' => 'كلمه المرور القديمه مطلوبه',
            'password.required' => ' كلمه المرور الجديده مطلوبه',
            'password.min' => ' كلمه المرور يجب ان لا تقل عن 6 حروف',
            'password.confirmed' => 'كلمه الجديده المرور غير متطابقه',
        ];
    }
}
