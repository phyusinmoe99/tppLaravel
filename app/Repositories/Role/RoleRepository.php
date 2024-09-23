<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface{
    public function index(){
        return Role::all();
    }
    public function store($data)
    {
        return Role::create($data);
    }
    public function show($id){
        return Role::with('permissions')->findOrFail($id);
    }
}
