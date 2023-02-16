<?php

namespace App\Models;


class Permission extends \Spatie\Permission\Models\Permission
{
    public static function getGuards()
    {
        $guards = config('auth.guards');
        return array_keys($guards);
    }
}
