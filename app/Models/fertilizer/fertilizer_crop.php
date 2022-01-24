<?php

namespace App\Models\fertilizer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class fertilizer_crop extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'potash',
        'dap',
        'urea'
    ];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
