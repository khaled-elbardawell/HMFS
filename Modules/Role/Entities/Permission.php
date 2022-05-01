<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [];

    public function roles(){
        return $this->belongsToMany(Role::class,'role_permissions');
    }

}
