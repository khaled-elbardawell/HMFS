<?php

namespace Modules\Chat\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
