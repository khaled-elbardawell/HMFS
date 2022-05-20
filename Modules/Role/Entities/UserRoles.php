<?php

namespace Modules\Role\Entities;

use App\Traits\SqlTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRoles extends Model
{
    use SqlTrait;
    protected $table = 'user_roles';

    protected $fillable = [];

    /**
     * @param $user_id
     * @param $organization_id
     * @return mixed
     */
    public static function getOrganizationUserRole($user_id,$organization_id){
        $sql = "SELECT user_roles.* FROM user_roles
                   INNER JOIN roles ON roles.id = user_roles.role_id AND  roles.organization_id = ?
                   WHERE user_roles.user_id = ?";
        return self::sql($sql,[$organization_id,$user_id])->sqlFirst();
    }// end method

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

}
