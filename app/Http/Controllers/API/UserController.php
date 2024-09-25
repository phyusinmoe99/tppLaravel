<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends BaseController
{

    protected UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = $this->userRepository->index();
        $data = UserResource::collection($users);

        return $this->sendResponse($data, 'Users List', 200);
    }

    public function store(Request $request)
    {
        $validateUser = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
            'status' => 'required|boolean',
            'role' => 'required|integer|exists:roles,id'
        ]);

        if ($validateUser->fails()) {
            return $this->error('Validation Error', $validateUser->errors(), 422);
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profileImage'), $imageName);
        }
        $role = Role::findOrFail($request->role);
        $data = $this->userRepository->store([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'image' => $imageName,

        ]);
        $data->assignRole($role->name);

        return $this->sendResponse('User Creatged Successfully', $data, 201);
    }

    public function show(string $id)
    {
        $user = $this->userRepository->show($id);

        if (!$user) {
            return $this->error('User not found', null, 404);
        }

        $data = new UserResource($user);
        return $this->sendResponse($data, 'User Show Successfully', 200);
    }


    public function update(Request $request, string $id)
    {
        $validateUser = Validator::make($request->all(), [
            'name' => 'required|string',
            'status' => 'required|boolean',
            'role' => 'required|integer|exists:roles,id'
        ]);

        if ($validateUser->fails()) {
            return $this->error('Validation Error', $validateUser->errors(), 422);
        }

        $data = $this->userRepository->show($id);

        if (!$data) {
            return $this->error('User not found', null, 404);
        }
        $role = Role::findOrFail($request->role);

        $updateData = $data->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        $data->syncRoles($role->name);

        return $this->sendResponse($updateData, 'User update successfully', 200);
    }


    public function destroy(string $id)
    {
        $data = $this->userRepository->show($id);

        

        if (!$data) {
            return $this->error('User not found', null, 404);
        }

        $deleteData = $data->delete();

        return $this->sendResponse($deleteData,'User deleted successfully',200);
    }
}
