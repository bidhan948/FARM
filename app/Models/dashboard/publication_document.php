<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class publication_document extends Model
{
    use HasFactory;

    protected $fillable = ['publication_id','document'];

    public function Publication(): BelongsTo
    {
        return $this->belongsTo(publication::class);
    }
}
