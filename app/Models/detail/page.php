<?php

namespace App\Models\detail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'agriculture_animal_detail_id',
        'title',
        'long_desc',
        'page_id',
        'featured_image',
    ];

    public function agricultureAnimalDetail(): BelongsTo
    {
        return $this->belongsTo(agriculture_animal_detail::class);
    }

    public function scopeParent($query)
    {
        $query->whereNull('page_id');
    }
}
