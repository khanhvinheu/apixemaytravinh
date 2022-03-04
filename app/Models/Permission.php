<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    // use HasFactory;

    public const VIEW_MENU = 'view menu ';

    /**
     * @return bool
     */
    public function isPermission(): bool
    {
        return $this->name === \ACL::PERMISSION_PERMISSION_MANAGE;
    }
}
