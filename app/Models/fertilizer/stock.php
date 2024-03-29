<?php

namespace App\Models\fertilizer;

use App\Models\setting\crop;
use App\Models\setting\unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class stock extends Model
{
    use HasFactory;

    const SEED = 'seed';
    const FERTILIZER = 'fertilizer';

    protected $fillable = [
        'quantity',
        'unit_id',
        'user_id',
        'crop_id',
        'fertilizer_id',
        'stock_type',
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
}
