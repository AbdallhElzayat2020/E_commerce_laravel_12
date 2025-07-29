<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;

    protected $fillable = [
        'permissions',
        'role'
    ];

    protected $table = 'roles';

    protected $casts = [
        'permissions' => 'array'
    ];

    public array $translatable = ['role'];

    /**
     * Get the admins for this role
     */
    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }

    /**
     * Check if this is the Super Admin role
     */
    public function isSuperAdmin(): bool
    {
        return $this->id === 1;
    }
}
