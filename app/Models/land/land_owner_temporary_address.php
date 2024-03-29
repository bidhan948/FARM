<?php

namespace App\Models\land;

use App\Models\setting\district;
use App\Models\setting\municipality;
use App\Models\setting\province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class land_owner_temporary_address extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];   

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function Province(): BelongsTo
    {
        return $this->belongsTo(province::class);
    }

    public function District(): BelongsTo
    {
        return $this->belongsTo(district::class);
    }
   
    public function Municipality(): BelongsTo
    {
        return $this->belongsTo(municipality::class);
    }
}
