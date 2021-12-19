<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class crop_type extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name'];

    public function Crop(): HasMany
    {
        return $this->hasMany(crop::class);
    }
}
