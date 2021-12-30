<?php

namespace App\Models\samuha;

use App\Models\land\land_owner;
use App\Models\setting\province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_farm extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'land_owner_id',
        'farm_name',
        'farm_pan_no',
        'farm_province_id',
        'farm_district_id',
        'farm_municipality_id',
        'farm_ward',
        'farm_toll_name',
        'farm_issue_date',
        'farm_issue_date',
        'farm_reg_no'
    ];

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function Province(): BelongsTo
    {
        return $this->belongsTo(province::class,'farm_province_id');
    }
}
