<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('read', function(User $user, string $model){
            $permissions = json_decode($user->permission->permissions, true);

            foreach($permissions as $indice => $value):
                if($indice == "read_{$model}" && $value == 'on'):
                    return true;
                endif;
            endforeach;

            return false;
        });

        Gate::define('create', function(User $user, string $model){
            $permissions = json_decode($user->permission->permissions, true);

            foreach($permissions as $indice => $value):
                if($indice == "create_{$model}" && $value == 'on'):
                    return true;
                endif;
            endforeach;

            return false;
        });

        Gate::define('update', function(User $user, string $model){
            $permissions = json_decode($user->permission->permissions, true);

            foreach($permissions as $indice => $value):
                if($indice == "update_{$model}" && $value == 'on'):
                    return true;
                endif;
            endforeach;

            return false;
        });

        Gate::define('delete', function(User $user, string $model){
            $permissions = json_decode($user->permission->permissions, true);

            foreach($permissions as $indice => $value):
                if($indice == "update_{$model}" && $value == 'on'):
                    return true;
                endif;
            endforeach;

            return false;
        });
    }
}
