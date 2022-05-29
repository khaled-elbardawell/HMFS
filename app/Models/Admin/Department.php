<?php

namespace App\Models\Admin;

use App\Traits\Paginate;
use App\Traits\SqlTrait;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use Paginate,SqlTrait;

    protected $guarded = [];
}
