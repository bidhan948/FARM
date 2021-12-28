<?php

namespace App\Models\entrepreneurship;

use App\Models\land\land_owner;
use App\Models\setting\district;
use App\Models\setting\municipality;
use App\Models\setting\organization_type;
use App\Models\setting\province;
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

    public function Province()
    {
        return $this->belongsTo(province::class,'province_id');
    }

    public function District()
    {
        return $this->belongsTo(district::class,'district_id');
    }

    public function Municipality()
    {
        return $this->belongsTo(municipality::class,'municipality_id');
    }
}
