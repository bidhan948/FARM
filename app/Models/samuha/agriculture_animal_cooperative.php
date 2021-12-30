<?php

namespace App\Models\samuha;

use App\Models\land\land_owner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class agriculture_animal_cooperative extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'land_owner_id',
        'cooperative_name',
        'cooperative_pan_no',
        'cooperative_province_id',
        'cooperative_district_id',
        'cooperative_municipality_id',
        'cooperative_ward',
        'cooperative_toll_name',
        'cooperative_issue_date',
        'cooperative_issue_date',
        'cooperative_reg_no'
    ];

    public function landOwner(): BelongsTo
    {
        return $this->belongsTo(land_owner::class);
    }
}
