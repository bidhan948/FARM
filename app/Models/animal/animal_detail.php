<?php

namespace App\Models\animal;

use App\Models\setting\animal;
use App\Models\setting\seed_source;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class animal_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function Animal(): BelongsTo
    {
        return $this->belongsTo(animal::class);
    }

    public function Source(): BelongsTo
    {
        return $this->belongsTo(seed_source::class);
    }
}
