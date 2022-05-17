<?php

namespace Modules\Task\Entities;

use App\Traits\Paginate;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Paginate;
    protected $guarded = [];

    public function comments(){
        return $this->hasMany('Modules\Task\Entities\Comment', 'task_id');
    }
    public function user_t(){
        return $this->belongsTo('App\User', 'user_to');
    }
    public function user_f(){
        return $this->belongsTo('App\User', 'user_from');
    }
}
