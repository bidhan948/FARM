<?php

namespace App\Http\Requests\setting;

use Illuminate\Foundation\Http\FormRequest;

class LandOwnerRequest extends FormRequest
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
            "name_nepali" => 'required',
            "name_english" => 'required',
            "age" => 'required',
            "gender_id" => 'required',
            "ethnic_group_id" => 'required',
            "citizenship_type_id" => 'required',
            "issue_dateBs" => "required",
            "issue_dateAd" => "required",
            "cit_no" => 'required',
            "issue_office" => 'required',
            "birth_dateBs" => "required",
            "birth_dateAd" => "required",
            "mother_tongue" => 'required',
            "contact_no" => 'required',
            "below_18.*" => 'required',
            "18_to_59.*" => 'required',
            "above_60.*" => 'required',
            "remark" => 'sometimes',
            "marital_status_id" => 'required',
            "couple_name" => 'required',
            "couple_cit_no" => 'required',
            "father_name" => 'required',
            "mother_name" => 'required',
            "father_cit_no" => 'required',
            "mother_cit_no" => 'required',
            "bussiness_id" => 'required',
            "education_qualification_id" => 'required',
            "permanent_province_id" => 'required',
            "permanent_district_id" => 'required',
            "permanent_municipality_id" => 'required',
            "permanent_ward" => 'required',
            "permanent_tole" => 'required',
            "permanent_country_name" => 'sometimes',
            "permanent_passport_no" => 'sometimes',
            "temporary_province_id" => 'required',
            "temporary_district_id" => 'required',
            "temporary_municipality_id" => 'required',
            "temporary_ward" => 'required',
            "temporary_tole" => 'required',
            "temporary_country_name" => 'sometimes',
            "temporary_passport_no" => 'sometimes',
            "name.*" => 'required',
            "account_no.*" => 'required',
            "country_name" => 'sometimes',
            "foreign_member" => 'sometimes',
        ];
    }
}
