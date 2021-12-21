<?php

namespace App\Helper;

use Illuminate\Http\Request;

class SettingHelper
{

    public function getSetting($arr = [])
    {
        foreach ($arr as $value) {
            $model = 'App\Models\setting\\' . $value;
            if (class_exists($model)) {
                $data[$value] = $model::query()->get();
            }
        }
        return collect($data);
    }

    public function getAddressFromRequest($attr = [], $type = "permanent")
    {
        if ($type == "permanent") {
            $data['province_id'] = $attr['permanent_province_id'];
            $data['district_id'] = $attr['permanent_district_id'];
            $data['municipality_id'] = $attr['permanent_municipality_id'];
            $data['ward'] = $attr['permanent_ward'];
            $data['tole'] = $attr['permanent_tole'];
            $data['country_name'] = $attr['permanent_country_name'];
            $data['passport_no'] = $attr['permanent_passport_no'];
        } else {
            $data['province_id'] = $attr['permanent_province_id'];
            $data['district_id'] = $attr['permanent_district_id'];
            $data['municipality_id'] = $attr['permanent_municipality_id'];
            $data['ward'] = $attr['permanent_ward'];
            $data['tole'] = $attr['permanent_tole'];
            $data['country_name'] = $attr['permanent_country_name'];
            $data['passport_no'] = $attr['permanent_passport_no'];
        }

        return $data;
    }

    public function getLandOwnerDataFromRequest($attr = [])
    {
        $data['name_nepali'] = $attr['name_nepali'];
        $data['name_english'] = $attr['name_english'];
        $data['gender_id'] = $attr['gender_id'];
        $data['ethnic_group_id'] = $attr['ethnic_group_id'];
        $data['citizenship_type_id'] = $attr['citizenship_type_id'];
        $data['issue_dateBs'] = $attr['issue_dateBs'];
        $data['issue_dateAd'] = $attr['issue_dateAd'];
        $data['cit_no'] = $attr['cit_no'];
        $data['issue_office'] = $attr['issue_office'];
        $data['birth_dateBs'] = $attr['birth_dateBs'];
        $data['birth_dateAd'] = $attr['birth_dateAd'];
        $data['mother_tongue'] = $attr['mother_tongue'];
        $data['contact_no'] = $attr['contact_no'];
        $data['marital_status_id'] = $attr['marital_status_id'];
        $data['couple_name'] = $attr['couple_name'];
        $data['couple_cit_no'] = $attr['couple_cit_no'];
        $data['father_name'] = $attr['father_name'];
        $data['father_cit_no'] = $attr['father_cit_no'];
        $data['mother_name'] = $attr['mother_name'];
        $data['mother_cit_no'] = $attr['mother_cit_no'];
        $data['bussiness_id'] = $attr['bussiness_id'];
        $data['education_qualification_id'] = $attr['education_qualification_id'];
        $data['is_foreign'] = $attr['is_foreign'];
        $data['country_name'] = $attr['country_name'];
        $data['foreign_member'] = $attr['foreign_member'];
        $data['age'] = $attr['age'];

        return $data;
    }
}
