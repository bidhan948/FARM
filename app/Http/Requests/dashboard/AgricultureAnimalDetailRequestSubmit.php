<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AgricultureAnimalDetailRequestSubmit extends FormRequest
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
            'crop_type_id' => 'required',
            'title' => 'required|unique:agriculture_animal_details',
            'featured_image' => 'required',
        ];
    }
}
