<?php

namespace App\Http\Requests\detail;

use Illuminate\Foundation\Http\FormRequest;

class AgricultureWeatherRequest extends FormRequest
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
            'title' => 'required',
            'year' => 'required',
            'dateFromBs' => 'required',
            'dateToBs' => 'required',
            'long_desc' => 'required',
            'date_desc' => 'required',
        ];
    }
}
