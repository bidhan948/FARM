<?php

namespace App\Models\entrepreneurship;

use App\Models\land\land_owner;
use App\Models\setting\organization_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class enterpreneurship extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function organizationType(): BelongsTo
    {
        return $this->belongsTo(organization_type::class);
    }
}
