<?php

namespace App\Models\fertilizer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fertilizer_area extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'equal_to_kattha'];
}
