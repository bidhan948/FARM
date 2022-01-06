<?php

namespace App\Models;

use App\Models\setting\crop_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'question',
        'answer',
        'crop_type_id',
        'is_insurance'
    ];

    public function cropType(): BelongsTo
    {
        return $this->belongsTo(crop_type::class);
    }
}
