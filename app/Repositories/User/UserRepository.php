<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::all();
    }
    public function store($data)
    {
        return User::create($data);
    }
    public function show($id)
    {
        return User::where('id', $id)->first();
    }
}
