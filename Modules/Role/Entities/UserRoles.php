<?php

namespace Modules\Role\Entities;

use App\Traits\SqlTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRoles extends Model
{
    use SqlTrait;
    protected $table = 'user_roles';

    protected $guarded = [];

    /**
     * @param $user_id
     * @param $organization_id
     * @return mixed
     */
    public static function getOrganizationUserRole($user_id,$organization_id){
        $sql = "SELECT user_roles.* FROM user_roles
                   INNER JOIN roles ON roles.id = user_roles.role_id AND  roles.organization_id = ?
                   WHERE user_roles.user_id = ?";
        return self::sqlFirst($sql,[$organization_id,$user_id]);
    }// end method


    public static function updateUserRole($user_id,$role_id,$organization_id){
        DB::update("UPDATE user_roles
                                INNER JOIN roles ON roles.id = user_roles.role_id AND roles.organization_id = ?
                                SET user_roles.role_id = ? , user_roles.user_id = ?
                                WHERE user_roles.user_id = ?",[$organization_id,$role_id,$user_id,$user_id]);
    }


    public static function deleteUserRole($user_id,$organization_id){
        DB::update("DELETE user_roles FROM user_roles
                                INNER JOIN roles ON roles.id = user_roles.role_id AND roles.organization_id = ?
                                WHERE user_roles.user_id = ?",[$organization_id,$user_id]);
    }


}
