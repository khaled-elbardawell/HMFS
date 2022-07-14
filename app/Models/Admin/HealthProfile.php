<?php

namespace App\Models\Admin;

use App\Traits\Paginate;
use App\Traits\SqlTrait;
use App\Traits\UploadTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;

class HealthProfile extends Model
{
    use Paginate,SqlTrait,UploadTrait;

    protected $guarded = [];

    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id');
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
