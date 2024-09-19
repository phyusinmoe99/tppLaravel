<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->middleware('auth');
        $this->roleRepository = $roleRepository;
    }
    public function index()
    {
        $roles = $this->roleRepository->index();
        return view('roles.index', compact('roles'));
    }


    public function create()
    {
        return view('roles.create');
    }


    public function store(RoleRequest $request)
    {

        $data = $request->validated();
        $this->roleRepository->store($data);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}


    public function edit(string $id)
    {
        $role = $this->roleRepository->show($id);
        return view('roles.edit', compact('role'));
    }


    public function update(Request $request, $id)
    {

        $data = $this->roleRepository->show($id);

        $data->update([
            'name' => $request->name,
        ]);

        return redirect()->route('role.index');
    }


    public function destroy($id)
    {
        $data = $this->roleRepository->show($id);
        $data->delete();
        return redirect()->route('role.index');
    }
}
