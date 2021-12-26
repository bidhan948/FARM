<?php

namespace App\Models\animal;

use App\Models\land\land_owner;
use App\Models\setting\animal;
use App\Models\setting\unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class animal_product_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function Animal(): BelongsTo
    {
        return $this->belongsTo(animal::class);
    }

    public function Unit(): BelongsTo
    {
        return $this->belongsTo(unit::class);
    }
}