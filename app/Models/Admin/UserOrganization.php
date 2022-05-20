<?php

namespace App\Models\Admin;

use App\Traits\SqlTrait;
use Illuminate\Database\Eloquent\Model;

class UserOrganization extends Model
{
    use SqlTrait;
    protected $guarded = [];

    public static function getUsersOrganizationDB($organization_id,$user_id = null){
        $bindings = [request()->organization_id];
        $sql = "SELECT   users.email,user_organizations.* FROM user_organizations
                         INNER JOIN users ON users.id = user_organizations.user_id
                         WHERE user_organizations.organization_id = ?";
        if ($user_id){
            $bindings[] = $user_id;
            $sql .= " AND user_organizations.user_id=?";
            return self::sql($sql,$bindings)->sqlFirst();
        }

        $countPagesql = "SELECT   COUNT(user_organizations.id) as page_counter FROM user_organizations
                         INNER JOIN users ON users.id = user_organizations.user_id
                         WHERE user_organizations.organization_id = ?";
        return self::sql($sql,$bindings)->pageSql($countPagesql,'page_counter',$bindings);
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function organization(){
        return $this->belongsTo('App\Models\Admin\Organization', 'organization_id');
    }

}
