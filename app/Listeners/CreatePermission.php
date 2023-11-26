<?php

namespace App\Listeners;

use App\Events\CreatePermissionForAdmin;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class CreatePermission
{
    public function handle(CreatePermissionForAdmin $event)
    {
        $permission_admin = Permission::where('eng_name', 'admin')->first();
        $old_permission = json_decode($permission_admin->permissions, true);

        $new_permissions = [
            "read_{$event->prefix}"   => 'on',
            "create_{$event->prefix}" => 'on',
            "update_{$event->prefix}" => 'on',
            "delete_{$event->prefix}" => 'on'
        ];

        $permissions = array_merge($old_permission, $new_permissions);
        $permissions = json_encode($permissions);

        DB::beginTransaction();
            Permission::find($permission_admin->id)->update([
                'permissions' => $permissions
            ]);
        DB::commit();
    }
}
