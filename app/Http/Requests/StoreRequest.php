<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'store_name' => 'required|min:6',
            'image' => 'required',
            'store_location' => 'required',
            'user_id' => 'required',
            'events' => 'required|min:6',
            'conduction' => 'required|numeric',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'store_name.required' => 'يجب ادخال اسم المتجر',
            'image.required' => 'يجب ادخال صوره المتجر',
            'store_name.min' => 'اسم المتجر يجب ان لايقل عن 6 ',
            'user_id.required' => 'يحب ادخال اسم صاحب المتجر',
            'store_location.required' => 'يجب ادخال موقع المتجر',
            'events.required' => 'يجب ادخال الفاعليات',
            'conduction.required' => 'يجب ادخال سعر التوصيل',
            'conduction.numeric' => 'سعر التوصيل يجب ان يكون رقم',
            'password.required' => 'يجب ادخال كلمه المرور للمتجر ',
            'password.min' => 'كلمه المرور للمتجر يجب ان لا تقل عن 4 حروف',
        ];
    }
}
