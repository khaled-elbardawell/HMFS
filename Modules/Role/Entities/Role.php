<?php

namespace Modules\Role\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [];

    public function users(){
        return $this->belongsToMany(User::class,'user_roles');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permissions');
    }

}
