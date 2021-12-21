<?php

namespace App\Models\land;

use App\Models\setting\gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class land_owner_family_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];  

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function Gender(): BelongsTo
    {
        return $this->belongsTo(gender::class);
    }
}
