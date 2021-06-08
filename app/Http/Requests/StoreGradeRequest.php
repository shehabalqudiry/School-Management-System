<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            'name'      => 'required|max:255|unique:grades,name->ar' . $this->id,
            'name_en'   => 'required|max:255|unique:grades,name->en' . $this->id,
            'notes'     => 'nullable',
        ];
    }
    public function message()
    {
        return [
            '*.required'      => __('validation.required'),
            '*.unique'        => __('validation.unique'),
        ];
    }
}
