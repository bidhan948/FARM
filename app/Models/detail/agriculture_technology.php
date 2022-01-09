<?php

namespace App\Models\detail;

use App\Models\setting\crop;
use App\Models\setting\crop_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_technology extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'crop_type_id',
        'crop_id',
        'title',
        'author',
        'document',
    ];

    public function cropType(): BelongsTo
    {
        return $this->belongsTo(crop_type::class);
    }

    public function Crop(): BelongsTo
    {
        return $this->belongsTo(crop::class);
    }
}
