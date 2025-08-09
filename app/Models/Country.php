<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;


class Country extends Model
{
    use HasTranslations;

    protected $table = 'countries';
    protected $fillable = ['name', 'phone_code', 'is_active'];

    public array $translatable = ['name'];

    public $timestamps = false;


    /*  =========== relations ===========  */
    public function governorates(): HasMany
    {
        return $this->hasMany(Governorate::class, 'country_id');
    }


    /* Accessors and Mutators  */
    protected function countryStatus(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->attributes['is_active'] == 1 ? 'Active' : 'Inactive',
        );
    }

    protected function isActive(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->attributes['is_active'] == 1 ? 'Active' : 'Inactive',
        );
    }


}
