<?php

namespace App\Http\Requests\fertilizer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FertilizerCropUpdateRequest extends FormRequest
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
            'name' => ['required', Rule::unique('fertilizer_crops')->ignore($this->Crop)],
            'category_id' => 'required',
            'potash' => 'required',
            'dap' => 'required',
            'urea' => 'required',
        ];
    }
}
