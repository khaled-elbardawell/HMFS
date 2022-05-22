<?php

namespace Modules\Role\Entities;

use App\Models\Admin\Organization;
use App\Traits\Paginate;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Paginate;

    protected $table = 'roles';
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class,'user_roles')->withTimestamps();
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permissions')->withTimestamps();
    }

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id');
    }

}
