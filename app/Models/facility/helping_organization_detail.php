<?php

namespace App\Models\facility;

use App\Models\land\land_owner;
use App\Models\setting\helping_organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class helping_organization_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function helpingOrganization(): BelongsTo
    {
        return $this->belongsTo(helping_organization::class);
    }
}
