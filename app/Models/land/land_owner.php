<?php

namespace App\Models\land;

use App\Models\setting\business;
use App\Models\setting\education_qualification;
use App\Models\setting\ethnic_group;
use App\Models\setting\gender;
use App\Models\setting\marital_status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class land_owner extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];  

   public function setAgeAttribute($value)
   {
       $this->attributes['age'] = English($value);
   }

   public function landOwnerPermanentAddress(): HasOne
   {
        return $this->hasOne(land_owner_permanent_address::class);
   }

   public function landOwnerTemporaryAddress(): HasOne
   {
        return $this->hasOne(land_owner_temporary_address::class);
   }

   public function Bank(): HasMany
   {
       return $this->hasMany(land_owner_bank_detail::class);
   }
   
   public function Gender(): BelongsTo
   {
       return $this->belongsTo(gender::class);
   }
   
   public function ethnicGroup(): BelongsTo
   {
       return $this->belongsTo(ethnic_group::class);
   }
   
   public function maritalStatus(): BelongsTo
   {
       return $this->belongsTo(marital_status::class);
   }

   public function Business(): BelongsTo
   {
       return $this->belongsTo(business::class,'bussiness_id');
   }
  
   public function educationQualification(): BelongsTo
   {
       return $this->belongsTo(education_qualification::class);
   }
}
