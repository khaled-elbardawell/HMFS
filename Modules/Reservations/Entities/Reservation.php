<?php

namespace Modules\Reservations\Entities;

use App\Traits\Paginate;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use Paginate;

    protected $guarded = [];



    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id');
    }

}
