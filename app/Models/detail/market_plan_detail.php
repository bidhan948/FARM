<?php

namespace App\Models\detail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class market_plan_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'entered_by', 'updated_by'];
}
