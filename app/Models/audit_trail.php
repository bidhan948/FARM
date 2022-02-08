<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class audit_trail extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'table_name',
        'old_value',
        'new_value',
        'affected_columns',
        'primary_key',
    ];

    public function User(): BelongsTo
    {
       return $this->belongsTo(User::class); 
    }
}
