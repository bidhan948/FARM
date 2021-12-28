<?php

namespace App\Models\entrepreneurship;

use App\Models\land\land_owner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class upcoming_plans extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }
}
