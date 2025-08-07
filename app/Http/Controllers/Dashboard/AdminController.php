<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use App\Services\Dashboard\AdminService;
use App\Services\Dashboard\RoleService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $adminService, $RoleServices;

    public function __construct(AdminService $adminService, RoleService $RoleServices)
    {
        $this->adminService = $adminService;
        $this->RoleServices = $RoleServices;
    }


    public function index()
    {
        $admins = $this->adminService->getAdmins();

        return view('dashboard.admins.index', compact('admins'));
    }

    public function create()
    {
        $roles = $this->RoleServices->getRoles();
        return view('dashboard.admins.create', compact('roles'));
    }

    public function store(AdminRequest $request)
    {
        $data = $request->only(['name', 'email', 'password', 'role_id', 'status']);
        $admin = $this->adminService->storeAdmin($data);
        if (!$admin) {
            return redirect()->back()->with('error', __('messages.error'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('messages.success'));
    }


    public function show(string $id)
    {
        $admin = $this->adminService->getAdmin($id);
        if (!$admin) {
            abort(404, __('messages.not_found'));
        }
        return view('dashboard.admins.show', compact('admin'));
    }

    public function edit(string $id)
    {
        $admin = $this->adminService->getAdmin($id);
        if (!$admin) {
            return redirect()->back()->with('error', __('messages.error'));
        }

        $roles = $this->RoleServices->getRoles();
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }


    public function update(AdminRequest $request, string $id)
    {
        $admin = $this->adminService->getAdmin($id);
        if (!$admin) {
            return redirect()->back()->with('error', __('messages.not_found'));
        }

        // Only include password in data if it's provided
        $data = $request->only(['name', 'email', 'role_id', 'status']);

        // Hash and include password only if provided
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $this->adminService->updateAdmin($data, $id);

        return redirect()->route('dashboard.admins.index')->with('success', __('messages.success'));
    }


    public function destroy($id)
    {
        $admin = $this->adminService->destroy($id);
        if (!$admin) {
            return redirect()->back()->with('error', __('messages.error'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('messages.success'));
    }

    public function changeStatus($id)
    {
        $admin = $this->adminService->getAdmin($id);
        if (!$admin) {
            abort(404, __('messages.not_found'));
        }
        if ($admin->status == 'active') {
            $admin->update([
                'status' => 'inactive',
            ]);
            return redirect()->back()->with('success', 'blocked successfully');
        }
        $admin->update([
            'status' => 'active',
        ]);
        return redirect()->back()->with('success', 'Activated successfully');
    }
}
