<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembersRequest extends FormRequest
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
            'name' => 'required|min:4',
            'email'=>'required|email|unique:users',
            'phone' => 'required',
            'password'=>'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'اسم العضو مطلوب',
            'name.min' => 'اسم العضو يجب ان لا يقل عن 4 حروف ',
            'email.required'=>'يجب ادخال البريد الالكتروني ',
            'email.email'=>'صيغه البريد الالكتروني غير صحيحه',
            'email.unique'=>'البريد الالكتروني مستخدم من قبل',
            'phone.required' => 'رقم الهاتف مطلوب',
            'password.required'=>'كلمه المرور مطلوبه',
            'password.min'=>'كلمه المرور يجب ان لاتقل عن 6 حروف'
        ];
    }
}
