<?php

namespace App\Models\dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class contact_us extends Model
{
    use HasFactory, SoftDeletes;
 
    const STATUS_TRUE = true;
    const STATUS_FALSE = false;
    
    protected $fillable =
    [
        'contact_us',
        'user_id',
        'user_id_updated',
        'is_active',
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
