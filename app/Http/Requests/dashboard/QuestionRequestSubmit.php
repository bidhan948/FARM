<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequestSubmit extends FormRequest
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
            'is_insurance' => 'required',
            'question' => 'required',
            'crop_type_id' => 'required_if:is_insurance,==,0|nullable',
            'crop_id' => 'required_if:is_insurance,==,0|nullable',
            'answer' => 'required'
        ];
    }
}
