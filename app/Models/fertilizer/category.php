<?php

namespace App\Models\fertilizer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name'];

    public function fertilizerCrop(): HasMany
    {
        return $this->hasMany(fertilizer_crop::class);     
    }
}
