<?php

namespace Modules\Website\Models;

use App\Traits\Paginate;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Paginate;

    protected $guarded = [];

}
