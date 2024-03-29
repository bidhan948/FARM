<?php

namespace App\Models\fertilizer;

use App\Models\land\land_owner;
use App\Models\setting\crop;
use App\Models\setting\unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class stock_log extends Model
{
    use HasFactory;

    const ASSIGN = 1;
    const IN = 0;

    protected $fillable = [
        'quantity',
        'unit_id',
        'user_id',
        'crop_id',
        'fertilizer_id',
        'stock_type',
        'is_out',
        'land_owner_id',
        'remark',
        'source'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Crop(): BelongsTo
    {
        return $this->belongsTo(crop::class);
    }

    public function Fertilizer(): BelongsTo
    {
        return $this->belongsTo(fertilizer::class);
    }

    public function Unit(): BelongsTo
    {
        return $this->belongsTo(unit::class);    
    }

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }
}
