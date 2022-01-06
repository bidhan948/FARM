<?php

namespace App\Models\setting;

use App\Models\agriculture\agriculture_detail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class crop_type extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','image'];

    public function Crop(): HasMany
    {
        return $this->hasMany(crop::class);
    }

    public function agricultureDetail(): HasMany
    {
        return $this->hasMany(agriculture_detail::class);
    }

    public function getImage()
    {
        return (config('constant.FOOD_PATH') . $this->image);
    }
}
