<?php

namespace App\Models\entrepreneurship;

use App\Models\land\land_owner;
use App\Models\setting\business;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class business_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function landOwner():BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function Business():BelongsTo
    {
        return $this->belongsTo(business::class);
    }
}
