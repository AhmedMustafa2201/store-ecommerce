<?php

namespace App\Http\Requests\Dashbord\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategories extends FormRequest
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
            'parient_id' => 'required|exists:categories,id',
            'name' => 'required',
            'slug'  => 'required|unique:categories,slug,'.$this->id
        ];
    }
}
