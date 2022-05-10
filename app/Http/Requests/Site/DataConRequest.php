<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class DataConRequest extends FormRequest
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

            'con_name' => 'required|max:100|string',
            'con_desc' => 'required|max:1100|string',
            'con_start_date' => 'required|date',
            'con_end_date' => 'required|date',

            'title' => 'required|max:100|string',
            'journal' => 'required|max:100|string',
            'pub_year' => 'required|date',

            'com_organisation' => 'required|max:100|string',
            'com_desc' => 'required|max:1100|string',
            'com_start_date' => 'required|date',
            'com_end_date' => 'required|date',
            'Policies' => 'required'

        ];
    }
}
