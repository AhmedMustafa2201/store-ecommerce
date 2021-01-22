<?php

namespace App\Http\Requests\Dashbord\Shipping;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipping extends FormRequest
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
            'id'=> 'required|exists:settings',
            'value' => 'required',
            'plane_value' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
