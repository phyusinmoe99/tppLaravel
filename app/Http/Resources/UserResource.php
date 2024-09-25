<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => asset('profileImage/'.$this->image),
            'status'=> $this->status == true ? 'Active' : 'Inactive',
            'role' => $this->roles->map(function($role){
                return $role->name;
            })

        ];
    }
}
