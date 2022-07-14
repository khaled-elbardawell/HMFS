<?php

namespace Modules\Task\Entities;

use App\Traits\Paginate;
use App\Traits\SqlTrait;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use Paginate,SqlTrait;
    protected $guarded = [];

    public function boardCards(){
        return $this->hasMany('Modules\Task\Entities\BoardCard', 'board_id');
    }
}
