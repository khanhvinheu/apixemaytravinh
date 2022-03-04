<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    // use HasFactory;
    /**
     * Check whether current role is admin
     * @return bool
    */
    public function isAdmin(): bool
    {
        return $this->name === \ACL::ROLE_ADMIN;
    }
}
