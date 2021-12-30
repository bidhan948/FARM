<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequestSubmit extends FormRequest
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
            'notice' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_dateAd' => 'required',
            'end_dateAd' => 'required',
        ];
    }
}
