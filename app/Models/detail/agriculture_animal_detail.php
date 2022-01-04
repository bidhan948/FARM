<?php

namespace App\Models\detail;

use App\Models\setting\crop_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_animal_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'crop_type_id',
        'title',
        'featured_image',
    ];

    public function cropType(): BelongsTo
    {
        return $this->belongsTo(crop_type::class);
    }

    public function Page(): HasMany
    {
        return $this->hasMany(page::class);
    }
}
