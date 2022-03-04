<?php
/**
 * File Constant.php
 *
 * @author Khanh Vinh <vinh.khanhdu@gmail.com>
 * @package Lara-app
 * @version 1.0
 */

namespace App\Library;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class ACL
 *
 * @package App\LaraJS
 */
final class ACL
{
    public const ROLE_ADMIN = 'admin';
    public const ROLE_MANAGER = 'manager';
    public const ROLE_VISITOR = 'visitor';
    public const ROLE_CREATOR = 'creator';
    public const ROLE_EDITOR = 'editor';
    public const ROLE_DELETER = 'deleter';

    public const PERMISSION_PERMISSION_MANAGE = 'manage permission';
    public const PERMISSION_VISIT = 'visit';
    public const PERMISSION_CREATE = 'create';
    public const PERMISSION_EDIT = 'edit';
    public const PERMISSION_DELETE = 'delete';

    public const PERMISSION_VIEW_MENU_ROLE_PERMISSION = 'view menu role_permission';
    public const PERMISSION_VIEW_MENU_USER = 'view menu user';

    /**
     * @param array $exclusives Exclude some permissions from the list
     * @return array
     */
    public static function permissions(array $exclusives = []): array
    {
        try {
            $class = new \ReflectionClass(self::class);
            $constants = $class->getConstants();
            $permissions = Arr::where($constants, function ($value, $key) use ($exclusives) {
                return !in_array($value, $exclusives) && Str::startsWith($key, 'PERMISSION_');
            });

            return array_values($permissions);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }

    public static function menuPermissions(): array
    {
        try {
            $class = new \ReflectionClass(self::class);
            $constants = $class->getConstants();
            $permissions = Arr::where($constants, function ($value, $key) {
                return Str::startsWith($key, 'PERMISSION_VIEW_MENU_');
            });

            return array_values($permissions);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }

    /**
     * @return array
     */
    public static function roles(): array
    {
        try {
            $class = new \ReflectionClass(self::class);
            $constants = $class->getConstants();
            $roles = Arr::where($constants, function ($value, $key) {
                return Str::startsWith($key, 'ROLE_');
            });

            return array_values($roles);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }

    public static function authRoles(): string
    {
        $roles = self::roles();
        $str = '';
        foreach ($roles as $key => $role) {
            if (count($roles) - 1 === $key) {
                $str .= $role;
            } else {
                $str .= $role . '|';
            }
        }
        return $str;
    }
}
