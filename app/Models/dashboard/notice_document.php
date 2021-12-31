<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class notice_document extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['notice_id','document'];

    public function Notice(): BelongsTo
    {
        return $this->belongsTo(notice::class);
    }
}
