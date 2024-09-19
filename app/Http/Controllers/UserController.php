<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = $this->userRepository->index();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        // dd($roles);
        return view('users.create',compact('roles'));
    }
    public function store(UserRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        $role = Role::findOrFail($data['role']);
        $user = $this->userRepository->store($data);
        $user->assignRole($role->name);

        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $roles = Role::all();
        $data = $this->userRepository->show($id);
        foreach($data->roles as $role){
            $selectRoleId = $role->id;
        }
        // dd($data->roles);
        return view('users.edit', compact('data','roles'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $data = $this->userRepository->show($request->id);
        $role = Role::findOrFail($request->role);
        $data->update([
            'name' => $request->name,
        ]);
        $data->syncRoles($role->name);

        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        // dd($id);
        $data = $this->userRepository->show($id);
        $data->delete();
        return redirect()->route('users.index');
    }
}
