<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class DataEduRequest extends FormRequest
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

            'edu_name' => 'required|max:100|string',
            'country_id' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',


            'category_id' => 'required|numeric',
            'categories' => 'required|array|min:1', //[]
            'categories.*' => 'numeric|exists:categories,id',

            'org_name' => 'required|max:100|string',
            'org_type' => 'required|in:1,2,3',
            'org_desc' => 'required|max:1100|string',
            'org_start_date' => 'required|date',
            'org_end_date' => 'required|date',

        ];
    }
}
