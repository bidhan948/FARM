<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gov_non_gov_facility extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name'];
}
