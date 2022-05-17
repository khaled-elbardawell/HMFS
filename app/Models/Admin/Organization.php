<?php

namespace App\Models\Admin;

use App\Traits\Paginate;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use Paginate;

    protected $guarded = [];


    public function users(){
        return $this->belongsToMany(User::class,'user_organizations','organization_id','id');
    }

}
