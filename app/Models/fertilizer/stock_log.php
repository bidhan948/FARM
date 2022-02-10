<?php

namespace App\Models\fertilizer;

use App\Models\setting\crop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class stock_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'unit_id',
        'user_id',
        'crop_id',
        'fertilizer_id',
        'stock_type'
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
}
