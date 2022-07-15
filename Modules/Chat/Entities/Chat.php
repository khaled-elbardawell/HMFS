<?php

namespace Modules\Chat\Entities;

use App\Traits\SqlTrait;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use SqlTrait;

    protected $guarded = [];

    public function participants(){
        return $this->hasMany(Participant::class,'chat_id');
    }


}
