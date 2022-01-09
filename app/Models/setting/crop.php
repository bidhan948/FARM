<?php

namespace App\Models\setting;

use App\Models\dashboard\question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class crop extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','crop_type_id'];

    public function Question(): HasMany
    {
        return $this->hasMany(question::class);
    }

    public function cropType(): BelongsTo
    {
        return $this->belongsTo(crop_type::class);
    }
}
