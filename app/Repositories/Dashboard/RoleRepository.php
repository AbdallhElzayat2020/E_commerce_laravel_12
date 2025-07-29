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

    public function updateRole($id, $request)
    {
        $role = Role::findOrFail($id);
        $role->role = [
            'ar' => $request->role['ar'],
            'en' => $request->role['en'],
        ];
        $role->permissions = json_encode($request->permissions);

        return $role;
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        return $role->delete();
    }
}