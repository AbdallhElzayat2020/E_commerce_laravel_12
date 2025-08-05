<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Models\Role;
use App\Services\Dashboard\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public RoleService $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getRoles();
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): \Illuminate\Http\RedirectResponse
    {
        $role = $this->roleService->createRole($request);
        if (!$role->save()) {
            return redirect()->back()->with('error', __('messages.error'));
        }
        return redirect()->route('dashboard.roles.index')->with('success', __('messages.success'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('dashboard.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Prevent updating of Super Admin role (ID = 1)
        if ($id === 1) {
            return redirect()->route('dashboard.roles.index')->with('error', __('dashboard_roles.cannot_edit_super_admin'));
        }

        $role = $this->roleService->updateRole($request, $id);

        if (!$role->save()) {
            return redirect()->back()->with('error', __('messages.error'));
        }
        return redirect()->route('dashboard.roles.index')->with('success', __('messages.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Prevent deletion of Super Admin role (ID = 1)
        if ($id == 1) {
            return redirect()->back()->with('error', __('dashboard_roles.cannot_delete_super_admin'));
        }

        $role = Role::findOrFail($id);

        // Check if role is being used by any admin
        if ($role->admins()->count() > 0) {
            return redirect()->back()->with('error', __('dashboard_roles.cannot_delete_super_admin'));
        }

        $deleted = $this->roleService->deleteRole($id);

        if (!$deleted) {
            return redirect()->back()->with('error', __('messages.error'));
        }

        return redirect()->route('dashboard.roles.index')->with('success', __('messages.success'));
    }
}
