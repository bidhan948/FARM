<?php

namespace App\Models\land_detail;

use App\Models\setting\irrigation_type;
use App\Models\setting\land_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class land_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];  

    public function landType(): BelongsTo
    {
        return $this->belongsTo(land_type::class);
    }

    public function irrigationType(): BelongsTo
    {
        return $this->belongsTo(irrigation_type::class);
    }

}
