<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgricultureDetailRequest extends FormRequest
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
            'seed_supplier_id.*' => 'required',
            'seed_source_id' => 'required',
        ];
    }
}
