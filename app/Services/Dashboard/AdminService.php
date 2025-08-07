<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AdminRepository;

class AdminService
{
    protected AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAdmins()
    {
        return $this->adminRepository->getAdmins();
    }

    public function getAdmin($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
            abort(404, 'Admin not found');
        }
        return $admin;
    }

    public function storeAdmin($data)
    {
        $admin = $this->adminRepository->storeAdmin($data);
        if (!$admin->save()) {
            return false;
        }
        return $admin;
    }

    public function updateAdmin($data, $id)
    {
        $admin = $this->getAdmin($id);
        if (!$admin) {
            abort(404, 'Admin not found');
        }

        $admin = $this->adminRepository->updateAdmin($data, $admin);
        if (!$admin->save()) {
            return false;
        }

        return $admin;
    }

    public function destroy($id)
    {
        $admin = $this->adminRepository->destroy($id);
        if (!$admin) {
            abort(404, 'Admin not found');
        }
        return $this->adminRepository->destroy($admin);
    }

    public function changeStatus($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
            abort(404, 'Admin not found');
        }
        $status = $this->adminRepository->changeStatus($admin);
    }
}
