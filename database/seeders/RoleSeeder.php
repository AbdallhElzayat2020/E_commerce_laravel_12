<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [];
        foreach (config('permissions') as $permission => $value) {
            $permissions[] = $permission;
        }

        Role::create([
            'role' => [
                'en' => 'Super Admin',
                'ar' => 'المشرف العام',
            ],
            'permissions' => json_encode($permissions)
        ]);
    }
}
