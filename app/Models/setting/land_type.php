<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class land_type extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name'];
}
