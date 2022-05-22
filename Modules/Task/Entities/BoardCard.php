<?php

namespace Modules\Task\Entities;

use App\Traits\Paginate;
use Illuminate\Database\Eloquent\Model;

class BoardCard extends Model
{
    use Paginate;
    protected $guarded = [];

    public function tasks(){
        return $this->hasMany('Modules\Task\Entities\Task', 'board_card_id');
    }
}
