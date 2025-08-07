<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
