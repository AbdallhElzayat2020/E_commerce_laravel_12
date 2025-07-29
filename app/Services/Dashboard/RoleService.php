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

    public function getRoles()
    {
        return $this->roleRepository->getRoles();
    }

    public function createRole($request)
    {
        return $this->roleRepository->createRole($request);
    }

    public function updateRole($request, $id)
    {
        return $this->roleRepository->updateRole($id, $request);
    }

    public function deleteRole($id)
    {
        return $this->roleRepository->deleteRole($id);
    }
}