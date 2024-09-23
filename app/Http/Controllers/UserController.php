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
        $roles = Role::with('permissions')->get();
        // dd($roles);
        return view('users.create',compact('roles'));
    }
    public function store(UserRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        // dd($data);

        $data['password'] = Hash::make($data['password']);


        if($request->hasFile('profile')){
            // dd('has');
            $profileName = time(). '.' . $request->file('profile')->getClientOriginalExtension();
            // dd($profileName);
            $request->profile->storeAs('profileImage',$profileName);
            $data['image'] = $profileName ;
        }
        $role = Role::findOrFail($data['role']);
        $user = $this->userRepository->store($data);
        // dd($user);
        $user->assignRole($role->name);

        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $roles = Role::all();
        $data = $this->userRepository->show($id);

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
            'status' => $request->status
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
