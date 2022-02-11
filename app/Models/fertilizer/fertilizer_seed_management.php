<?php

namespace App\Models\fertilizer;

use App\Models\land\land_owner;
use App\Models\setting\crop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class fertilizer_seed_management extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'land_owner_id',
        'stock_type',
        'unit_id',
        'quantity',
        'remark',
        'fertilizer_id',
        'crop_id',
        'user_id'
    ];

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }
    
    public function Unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    
    public function Fertilizer(): BelongsTo
    {
        return $this->belongsTo(fertilizer::class);
    }

    public function Crop(): BelongsTo
    {
        return $this->belongsTo(crop::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
