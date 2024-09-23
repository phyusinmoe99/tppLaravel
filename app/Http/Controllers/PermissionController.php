<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    private PermissionRepositoryInterface $permissionRepository;
    private RoleRepositoryInterface $roleRepository;
    public function __construct(PermissionRepositoryInterface $permissionRepository,RoleRepositoryInterface $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
    }
    public function index()
    {
        $permissions = $this->permissionRepository->index();

        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleRepository->index();
        return view('permissions.create',compact('roles'));
    }


    public function store(PermissionRequest $request) {

        $data = $request->validated();

        $permission = $this->permissionRepository->store($data);
        $role = Role::findOrFail($data['role']);
        $role->syncPermissions($permission);



        return redirect()->route('permission.index');
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->permissionRepository->show($id);
        $data->delete();
        return redirect()->route('permission.index');
    }
}
