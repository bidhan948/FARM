<?php

namespace App\Models\agriculture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    
}
