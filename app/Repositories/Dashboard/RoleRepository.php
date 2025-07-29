<?php

namespace App\Repositories\Dashboard;

use App\Models\Role;

class RoleRepository
{
    public function createRole($request)
    {
        return Role::create([
            'role' => [
                'ar' => $request->role['ar'],
                'en' => $request->role['en'],
            ],

            'permissions' => json_encode($request->permissions)
        ]);

    }
}