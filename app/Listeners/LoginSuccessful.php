<?php

namespace App\Listeners;

use App\Models\Admin\UserOrganization;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Modules\Role\Entities\UserRoles;

class LoginSuccessful
{
     /***********************************************
     * LoginSuccessful Listener Class
     ************************************************
     * When Fire Login Event This Listener Fire
     * To Check Auth User Is SuperAdmin Or Not
     * If Not Get Last Organization User Register
     * And Save Results In Session
     ************************************************/


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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (!$this->isAuthUserSuperAdmin()){
            $user_organization = $this->getAuthUserLastRegisterOrganization();
            if(isset($user_organization)) {
                session()->put('organization_id',$user_organization->organization_id);
                UserOrganization::where('organization_id',$user_organization->id)->update(["last_login" => Carbon::now()]);
            }else{
                return auth()->logout();
            }
        }
    }// end method




    /**
     * Get Last Register Organization For Auth User
     *
     * @return mixed|null
     */
    private function getAuthUserLastRegisterOrganization(){
       return  UserOrganization::sqlFirst('SELECT user_organizations.* FROM user_organizations
                                                    INNER JOIN organizations ON organizations.id = user_organizations.organization_id
                                                    WHERE user_organizations.user_id = ?
                                                    ORDER BY user_organizations.last_login DESC LIMIT 1',[auth()->id()]);
    }// end method


    /**
     * Is Auth User SuperAdmin And Save In Session
     * @return bool
     */
    private function isAuthUserSuperAdmin(){
        $is_super_admin = UserRoles::where('user_id',auth()->id())->where('role_id',1)->first();
        session()->put('is_super_admin',isset($is_super_admin->user_id));
        return isset($is_super_admin->user_id);
    }// end method
}
