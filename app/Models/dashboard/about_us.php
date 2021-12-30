<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class about_us extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'about_us',
        'user_id',
        'user_id_updated',
        'is_active',
    ];
}
