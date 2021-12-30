<?php

namespace App\Models\samuha;

use App\Models\land\land_owner;
use App\Models\setting\province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_samuha extends Model
{
    use HasFactory, SoftDeletes;

    // protected $guarded = [];
    protected $fillable = [
        'land_owner_id',
        'samuha_name',
        'samuha_pan_no',
        'samuha_province_id',
        'samuha_district_id',
        'samuha_municipality_id',
        'samuha_ward',
        'samuha_toll_name',
        'samuha_issue_date',
        'samuha_issue_date',
        'samuha_reg_no'
    ];

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }

    public function Province(): BelongsTo
    {
        return $this->belongsTo(province::class, 'samuha_province_id');
    }
}
