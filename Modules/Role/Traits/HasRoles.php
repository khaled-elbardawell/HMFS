<?php

namespace Modules\Role\Traits;


use Illuminate\Support\Facades\DB;
use Modules\Role\Entities\Role;

trait HasRoles
{

    /**
     * User Roles Relation (* to *)
     * @return mixed
     */
    public function roles(){
        return $this->belongsToMany(Role::class,'user_roles');
    }// end method



    /**
     * Check Auth User Has Specific Permission
     * @param $permission_name
     * @return bool
     */
    public static function hasPermission($permission_name){
        $sql = "SELECT  permissions.* , user_roles.role_id FROM user_roles
                                INNER JOIN users ON users.id = user_roles.user_id
                                INNER JOIN role_permissions ON user_roles.role_id = role_permissions.role_id
                                INNER JOIN permissions ON role_permissions.permission_id = permissions.id
                                WHERE users.id = ? AND permissions.name = ?";
        $user_permissions = DB::select($sql,[auth()->id(),$permission_name]);
        if (count($user_permissions) > 0){
            return true;
        }
        return false;
    }// end method


}// end trait
