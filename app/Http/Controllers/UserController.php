<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('users.create');
    }
    public function store(UserRequest $request)
    {
        // dd('store');
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $this->userRepository->store($data);
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $data = $this->userRepository->show($id);
        return view('users.edit', compact('data'));
    }
    // public function update(Request $request)
    // {
    //     $data = $this->userRepository->show($request->id);
    //     $data->update([
    //         'name' => $request->name,
    //         'email' => $request->email
    //     ]);

    //     return redirect()->route('users.index');
    // }
    public function destroy($id)
    {
        // dd($id);
        $data = $this->userRepository->show($id);
        $data->delete();
        return redirect()->route('users.index');
    }
}
