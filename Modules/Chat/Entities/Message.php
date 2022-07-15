<?php

namespace Modules\Chat\Entities;

use App\Traits\UploadTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use UploadTrait;

    protected $guarded = [];

    public function recipients(){
        return $this->hasMany(Recipient::class,'message_id');
    }

    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }


}
