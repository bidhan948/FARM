<?php

namespace App\Models\agriculture;

use App\Models\setting\seed_source;
use App\Models\setting\seed_supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class seed_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function seedSource(): BelongsTo
    {
        return $this->belongsTo(seed_source::class);
    }

    public function seedSupplier(): BelongsTo
    {
        return $this->belongsTo(seed_supplier::class);
    }
}
