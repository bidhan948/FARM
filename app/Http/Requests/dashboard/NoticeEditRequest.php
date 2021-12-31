<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class NoticeEditRequest extends FormRequest
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
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'start_dateAd' => 'required',
            'end_dateAd' => 'required',
        ];
    }
}
