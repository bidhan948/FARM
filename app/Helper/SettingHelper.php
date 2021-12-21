<?php

namespace App\Helper;

class SettingHelper{

    public function getSetting($arr=[])
    {
        foreach ($arr as $value) {
            $model = 'App\Models\setting\\'.$value;
            if (class_exists($model)) {
                $data[$value] = $model::query()->get();
            }
        }
        return collect($data);
    }
}