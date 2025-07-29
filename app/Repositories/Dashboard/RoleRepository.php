<?php

namespace App\Repositories\Dashboard;

use App\Models\Role;

class RoleRepository
{

    public function getRoles()
    {
        return Role::select('id', 'role', 'permissions')->paginate(9)
            ->withQueryString();
    }

    public function createRole($request)
    {
        return Role::create([
            'role' => [
                'ar' => $request->role['ar'],
                'en' => $request->role['en'],
            ],

            'permissions' => $request->permissions
        ]);
    }

    public function updateRole($id, $request)
    {
        $role = Role::findOrFail($id);
        $role->role = [
            'ar' => $request->role['ar'],
            'en' => $request->role['en'],
        ];
        $role->permissions = $request->permissions;

        return $role;
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        return $role->delete();
    }
}
