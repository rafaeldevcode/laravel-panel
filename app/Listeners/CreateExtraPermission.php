<?php

namespace App\Listeners;

use App\Events\CreateExtraPermissionForAdmin;
use App\Models\Permission;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CreateExtraPermission
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateExtraPermissionForAdmin  $event
     * @return void
     */
    public function handle(CreateExtraPermissionForAdmin $event)
    {
        if($event->extra_permissions):
            $permission_admin = DB::table('permissions')
                ->where('eng_name', 'admin')
                ->get()[0];

                $old_permissions = json_decode($permission_admin->permissions, true);
                $extra_permissions = json_decode($event->extra_permissions, true);
                $filter_extra_permissions = array_filter($extra_permissions, function($value, $key)use($old_permissions){

                    if(!array_key_exists($key, $old_permissions)):
                        return true;
                    endif;
                }, ARRAY_FILTER_USE_BOTH);

                $extra_permissions = empty($filter_extra_permissions) ? $permission_admin->extra_permissions : array_merge(json_decode($permission_admin->extra_permissions, true), $filter_extra_permissions);

                $new_permissions = array_merge($old_permissions, $filter_extra_permissions);

                $permissions = json_encode($new_permissions);

                DB::beginTransaction();
                    Permission::find($permission_admin->id)->update([
                        'permissions'       => $permissions,
                        'extra_permissions' => $extra_permissions
                    ]);
                DB::commit();
        endif;
    }
}
