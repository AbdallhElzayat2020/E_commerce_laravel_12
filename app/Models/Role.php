<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;

    protected $fillable = [
        'permissions', 'role'
    ];

    protected $table = 'roles';

    public array $translatable = ['role'];
}
