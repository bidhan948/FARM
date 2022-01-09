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

    // below is accessor used another approach bcz laravel doc convention doesnt work here
    public function getDateDesc(): string
    {
        return Nepali($this->date_desc);
    }

    public function getYear(): string
    {
        return Nepali($this->year);
    }
    
    public function getIndex(): string
    {
        return Nepali($this->index);
    }

}
