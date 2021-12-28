<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterpeunershipRequest extends FormRequest
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
            'arrogance_status' => 'required',
            'organization_name_nepali' => 'required_if:arrogance_status,==,1|nullable',
            'organization_name_english' => 'required_if:arrogance_status,==,1|nullable',
            'organization_type_id' => 'required_if:arrogance_status,==,1|nullable',
            'organization_budget' => 'required_if:arrogance_status,==,1|nullable',
            'pan_no' => 'required_if:arrogance_status,==,1|nullable',
            'contact_person_name' => 'required_if:arrogance_status,==,1|nullable',
            'permanent_province_id' => 'required_if:arrogance_status,==,1|nullable',
            'permanent_district_id' => 'required_if:arrogance_status,==,1|nullable',
            'permanent_municipality_id' => 'required_if:arrogance_status,==,1|nullable',
            'ward' => 'required_if:arrogance_status,==,1|nullable',
            'toll_name' => 'required_if:arrogance_status,==,1|nullable',
            'no_of_staff_in_field' => 'required_if:arrogance_status,==,1|nullable',
            'amsik_no_of_staff' => 'required_if:arrogance_status,==,1|nullable',
            'ot_no_of_staff' => 'required_if:arrogance_status,==,1|nullable',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'province_id' => $this->permanent_province_id,
            'district_id' => $this->permanent_district_id,
            'municipality_id' => $this->permanent_municipality_id,
        ]);
    }
}
