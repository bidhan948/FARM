<?php

namespace App\Models\land;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class land_owner_bank_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];  

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }
}
