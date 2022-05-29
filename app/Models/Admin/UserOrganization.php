<?php

namespace App\Models\Admin;

use App\Traits\SqlTrait;
use Illuminate\Database\Eloquent\Model;

class UserOrganization extends Model
{
    use SqlTrait;
    protected $guarded = [];

    public static function getUsersOrganizationDB($organization_id,$user_id = null){
        $bindings = [$organization_id];

        $sql = "SELECT   users.*,user_organizations.department_id,user_organizations.organization_id,user_organizations.last_login,user_organizations.status,user_organizations.registered_at FROM user_organizations
                         INNER JOIN users ON users.id = user_organizations.user_id
                         WHERE user_organizations.organization_id = ?";
        if ($user_id){
            $bindings[] = $user_id;
            $sql .= " AND user_organizations.user_id=?";
            return self::sqlFirst($sql,$bindings);
        }

        $countPagesql = "SELECT   COUNT(user_organizations.id) as page_counter FROM user_organizations
                         INNER JOIN users ON users.id = user_organizations.user_id
                         WHERE user_organizations.organization_id = ?";
        return self::sqlPage($sql,$bindings,$countPagesql,'page_counter',$bindings);
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function organizations(){
        return $this->belongsTo('App\Models\Admin\Organization', 'organization_id');
    }

}
