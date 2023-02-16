<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    public function savePermissions(array $permissions): void
    {
        if (count($permissions) > 0) {
            $permissions = array_keys($permissions);
            if ($this->permission) {
                $this->permission()->sync($permissions);
            } else {
                $this->permission()->attach($permissions);
            }
        }
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }
}
