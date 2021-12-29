<?php

namespace App\Models\samuha;

use App\Models\land\land_owner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_animal_cooperative extends Model
{
    use HasFactory,SoftDeletes;

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }
}
