<?php

namespace App\Models\detail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_weather extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'index',
        'year',
        'dateFromBs',
        'dateToBs',
        'long_desc',
        'date_desc',
    ];

}
