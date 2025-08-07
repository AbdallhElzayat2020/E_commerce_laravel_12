<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;

class AdminRepository
{
    public function getAdmins()
    {
        return Admin::select('id', 'name', 'email', 'role_id', 'status')
            ->with('role')
            ->paginate(9)->withQueryString();
    }

    public function getAdmin($id)
    {
        return Admin::find($id);
    }

    public function storeAdmin($data)
    {
        return Admin::create($data);
    }

    public function updateAdmin($data, $admin)
    {
        return $admin->update($data);
    }

    public function destroy($admin)
    {
        return $admin->delete();
    }

    public function changeStatus($status, $admin)
    {
        $admin = $this->getAdmin($admin);

        return $admin->update(['status' => $status]);
    }

}
