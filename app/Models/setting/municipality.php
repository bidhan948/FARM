<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipality extends Model
{
    use HasFactory;

    protected $fillable = ['NepaliName', 'EnglishName', 'DistrictId', 'NepaliType', 'EnglishType'];
}
