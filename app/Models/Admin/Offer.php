<?php

namespace App\Models\Admin;

use App\Traits\Paginate;
use App\Traits\SqlTrait;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use Paginate,UploadTrait,SqlTrait;

    protected $guarded = [];

    public function offerFeatures(){
        return $this->hasMany('App\Models\Admin\OfferFeatures', 'id');
    }

}
