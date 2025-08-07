<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'country_id',
    ];
    protected $table = 'governorates';
    public array $translatable = ['name'];

    public $timestamps = false;

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
