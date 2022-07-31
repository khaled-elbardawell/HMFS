<?php

namespace App\Models\Admin;

use App\Traits\Paginate;
use App\Traits\SqlTrait;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use Paginate,UploadTrait,SqlTrait;

    protected $guarded = [];

    public function offerFeatures(){
        return $this->belongsToMany(Offer::class, 'offer_features','feature_id','offer_id');
    }

}
