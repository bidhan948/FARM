<?php

namespace App\Models\land;

use App\Models\agriculture\agriculture_detail;
use App\Models\agriculture\seed_detail;
use App\Models\animal\animal_detail;
use App\Models\animal\animal_other_detail;
use App\Models\animal\animal_product_detail;
use App\Models\entrepreneurship\business_detail;
use App\Models\entrepreneurship\enterpreneurship;
use App\Models\entrepreneurship\upcoming_plans;
use App\Models\facility\facility_detail;
use App\Models\facility\helping_organization_detail;
use App\Models\land_detail\land_detail;
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
    use HasFactory, SoftDeletes;

    const ARROGANCE_TRUE = 1;
    const ARROGANCE_FALSE = 0;

    protected $guarded = [];

    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = English($value);
    }

    public function landDetail(): HasMany
    {
        return $this->hasMany(land_detail::class);
    }

    public function agricultureDetail(): HasMany
    {
        return $this->hasMany(agriculture_detail::class);
    }

    public function seedDetail(): HasMany
    {
        return $this->hasMany(seed_detail::class);
    }

    public function animalDetail(): HasMany
    {
        return $this->hasMany(animal_detail::class);
    }

    public function animalProduct(): HasMany
    {
        return $this->hasMany(animal_product_detail::class);
    }

    public function animalOtherProduct(): HasMany
    {
        return $this->hasMany(animal_other_detail::class);
    }

    public function Enterperneurship(): HasMany
    {
        return $this->hasMany(enterpreneurship::class);
    }

    public function businessDetail(): HasMany
    {
        return $this->hasMany(business_detail::class);
    }

    public function upcomingPlans(): HasMany
    {
        return $this->hasMany(upcoming_plans::class);
    }

    public function facilityDetail(): HasMany
    {
        return $this->hasMany(facility_detail::class);
    }

    public function helpingOrganization(): HasMany
    {
        return $this->hasMany(helping_organization_detail::class);
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
        return $this->belongsTo(business::class, 'bussiness_id');
    }

    public function educationQualification(): BelongsTo
    {
        return $this->belongsTo(education_qualification::class);
    }
}
