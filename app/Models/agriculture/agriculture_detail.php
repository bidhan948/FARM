<?php

namespace App\Models\agriculture;

use App\Models\setting\crop;
use App\Models\setting\crop_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function cropType(): BelongsTo
    {
        return $this->belongsTo(crop_type::class);
    }

    public function Crop(): BelongsTo
    {
        return $this->belongsTo(crop::class);
    }
}
