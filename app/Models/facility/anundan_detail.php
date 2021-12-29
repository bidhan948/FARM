<?php

namespace App\Models\facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class anundan_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
}
