<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
