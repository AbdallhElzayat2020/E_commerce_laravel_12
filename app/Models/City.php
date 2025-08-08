<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    protected $table = 'cities';
    protected $fillable = [
        'name',
        'governorate_id',
    ];
    public array $translatable = ['name'];

    public $timestamps = false;

    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }
}
