<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SamuhaDetailRequest extends FormRequest
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
            'samuha_status' => 'required',
            "samuha_name" => 'required_if:samuha_status,==,1|nullable',
            "samuha_pan_no" => 'required_if:samuha_status,==,1|nullable',
            "samuha_reg_no" => 'required_if:samuha_status,==,1|nullable',
            "samuha_issue_date" => 'required_if:samuha_status,==,1|nullable',
            "permanent_province_id" => 'required_if:samuha_status,==,1|nullable',
            "permanent_district_id" => 'required_if:samuha_status,==,1|nullable',
            "permanent_municipality_id" => 'required_if:samuha_status,==,1|nullable',
            "samuha_ward" => 'required_if:samuha_status,==,1|nullable',
            "samuha_toll_name" => 'required_if:samuha_status,==,1|nullable',
            "cooperative_status" => "required",
            "cooperative_name" => 'required_if:cooperative_status,==,1|nullable',
            "cooperative_pan_no" => 'required_if:cooperative_status,==,1|nullable',
            "cooperative_reg_no" => 'required_if:cooperative_status,==,1|nullable',
            "cooperative_issue_date" => 'required_if:cooperative_status,==,1|nullable',
            "temporary_province_id" => 'required_if:cooperative_status,==,1|nullable',
            "temporary_district_id" => 'required_if:cooperative_status,==,1|nullable',
            "temporary_municipality_id" => 'required_if:cooperative_status,==,1|nullable',
            "cooperative_ward" => 'required_if:cooperative_status,==,1|nullable',
            "cooperative_toll_name" => 'required_if:cooperative_status,==,1|nullable',
            "farm_status" => "required",
            "farm_name" => 'required_if:farm_status,==,1|nullable',
            "farm_pan_no" => 'required_if:farm_status,==,1|nullable',
            "farm_reg_no" => 'required_if:farm_status,==,1|nullable',
            "farm_issue_date" => 'required_if:farm_status,==,1|nullable',
            "farm_province_id" => 'required_if:farm_status,==,1|nullable',
            "farm_district_id" => 'required_if:farm_status,==,1|nullable',
            "farm_municipality_id" => 'required_if:farm_status,==,1|nullable',
            "farm_ward" => 'required_if:farm_status,==,1|nullable',
            "farm_toll_name" => 'required_if:farm_status,==,1|nullable',
        ];
    }
}
