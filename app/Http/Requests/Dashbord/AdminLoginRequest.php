<?php

namespace App\Http\Requests\Dashbord;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'يجب ان تدخل البريد الالكترونى',
            'email.email' => 'صيغه البريد الالكترونى غير صحيحه',
            'password.required' => 'يجب عليك ان تدخل كلمه السر',
        ];
    }
}
