<?php

namespace Modules\Reservations\Entities;

use App\Models\Admin\Organization;
use App\Traits\Paginate;
use App\Traits\SqlTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use Paginate,SqlTrait;

    protected $guarded = [];



    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id');
    }

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id');
    }

}
