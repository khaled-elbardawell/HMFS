<?php

namespace App\Models\Admin;

use App\Traits\Paginate;
use App\Traits\SqlTrait;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class OfferFeatures extends Model
{
    use Paginate,UploadTrait,SqlTrait;

    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\User', 'id');
    }

    public function offer(){
        return $this->hasOne('App\Models\Admin\Offer', 'id');
    }

    public function features(){
        return $this->hasMany('App\Models\Admin\Feature', 'id');
    }

}
