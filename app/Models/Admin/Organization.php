<?php

namespace App\Models\Admin;

use App\Constant;
use App\Traits\Paginate;
use App\Traits\SqlTrait;
use App\Traits\UploadTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Role\Entities\Permission;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\RolePermissions;
use Modules\Role\Entities\UserRoles;

class Organization extends Model
{
    use Paginate,UploadTrait,SqlTrait;

    protected $guarded = [];


    public function users(){
        return $this->belongsToMany(User::class,'user_organizations','organization_id','id');
    }

    public static function AssignOwnerToOrganizationWithRoles($request,$owner,$organization){
        UserOrganization::create([
            'user_id'         => $owner->id,
            'organization_id' => $organization->id,
            'registered_at'   => Carbon::now(),
            "status"    => $request->has('status') ? 1 : 0,
        ]);

        $role_types =  Constant::where('type','role_types')->where('id','!=',6)->whereNotNull('parent_id')->get();
        foreach ($role_types as $role_type){
            $role = Role::create(['name' => $role_type->name,'organization_id' => $organization->id,'role_type_id' => $role_type->id]);
            if ($role_type->id == 2){
                UserRoles::create(['role_id' => $role->id, 'user_id' => $owner->id]);
                $permissions =  Permission::all();
                foreach ($permissions as $permission){
                    RolePermissions::create(['role_id' => $role->id ,'permission_id' => $permission->id]);
                }
            }
        }
    }

}
