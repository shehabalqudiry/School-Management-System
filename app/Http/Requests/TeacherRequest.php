<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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

    public function rules()
    {
        return [
            'email'             => 'required|max:255|unique:teachers,email' . $this->id,
            'name'              => 'required',
            'name_en'           => 'required',
            'specialization_id' => 'required',
            'gender_id'         => 'required',
            'joining_date'      => 'required|date|date_format:Y-m-d',
            'address'           => 'required',
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
