<?php

namespace App\Models\land_detail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class land_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];  

}
