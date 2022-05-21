<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\Role\Entities\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user){
            $is_super_admin = DB::table('user_roles')->where('role_id',1)->where('user_id',$user->id)->first();
            if($is_super_admin){
               return true;
            }
        });


        Gate::define('is_super_admin', function (User $user){
            return session('is_super_admin');
        });


        $permissions = Permission::all();
        foreach ($permissions as $permission){
            Gate::define($permission->name, function (User $user) use ($permission) {
                return User::hasPermission($permission->name);
            });
        }

    }
}
