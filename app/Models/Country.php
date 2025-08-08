<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    protected $table = 'countries';
    protected $fillable = ['name', 'phone_code'];

    public array $translatable = ['name'];

    public $timestamps = false;

    public function governorates(): HasMany
    {
        return $this->hasMany(Governorate::class, 'country_id');
    }
}
