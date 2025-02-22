<?php

namespace App\Models\Admin;

use App\Traits\Paginate;
use App\Traits\SqlTrait;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Paginate,UploadTrait,SqlTrait;

    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\User', 'id');
    }

}
