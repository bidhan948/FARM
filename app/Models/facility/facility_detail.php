<?php

namespace App\Models\facility;

use App\Models\land\land_owner;
use App\Models\setting\gov_non_gov_facility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class facility_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function landOwner():BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function Facility()
    {
        return $this->belongsTo(gov_non_gov_facility::class,'facility_id');
    }

    public function anudanDetail(): HasOne
    {
        return $this->hasOne(anundan_detail::class);
    }
}
