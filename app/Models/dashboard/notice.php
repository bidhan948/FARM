<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class notice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'notice',
        'start_date',
        'end_date',
        'start_dateAd',
        'end_dateAd',
        'entered_by',
        'updated_by'
    ];

    public function noticeDocument(): HasMany
    {
        return $this->hasMany(notice_document::class);
    }
}
