<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:8',
            'gender_id' => 'required',
            'nationalitie_id' => 'required',
            'blood_id' => 'required',
            'date_birth' => 'required|date|date_format:Y-m-d',
            'grade_id' => 'required',
            'level_id' => 'required',
            'section_id' => 'required',
            'sparent_id' => 'required',
            'academic_year' => 'required',
        ];
    }
}
