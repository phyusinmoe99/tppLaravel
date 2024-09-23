<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    private RoleRepositoryInterface $roleRepository;
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->middleware('auth');
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }
    public function index()
    {
        $roles = $this->roleRepository->index();
        return view('roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = $this->permissionRepository->index();
        return view('roles.create', compact('permissions'));
    }


    public function store(RoleRequest $request)
    {

        $data = $request->validated();
        // dd($data);
        $role = $this->roleRepository->store($data);

        $role->syncPermissions($data['permissions']);
        return redirect()->route('role.index');
    }


    public function show(string $id) {}


    public function edit(string $id)
    {
        $role = $this->roleRepository->show($id);
        // dd($role);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->roleRepository->show($id);
        $data->update([
            'name' => $request->name,
        ]);
        // dd($data);
        $data->permissions()->sync($request->permissions);
        return redirect()->route('role.index');
    }


    public function destroy($id)
    {
        $data = $this->roleRepository->show($id);
        $data->delete();
        return redirect()->route('role.index');
    }
}
