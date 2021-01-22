<?php

namespace App\Http\Requests\Dashbord\tags;

use Illuminate\Foundation\Http\FormRequest;

class tagsRequest extends FormRequest
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
            'name' => 'required|string',
            'slug'  => 'required|unique:tags,slug,'.$this -> id
        ];
    }
}
