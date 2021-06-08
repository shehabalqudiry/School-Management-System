<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
            'list_levels.*.name'      => 'required',
            'list_levels.*.name_en'   => 'required',
            'list_levels.*.grade_id'  => 'required',
        ];
    }
    public function message()
    {
        return [
            '*.required'      => __('validation.required'),
        ];
    }
};
