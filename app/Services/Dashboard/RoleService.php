<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\RoleRepository;

class RoleService
{
    public RoleRepository $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function createRole($request)
    {
        $role = $this->roleRepository->createRole($request);
        return $role;
    }
}