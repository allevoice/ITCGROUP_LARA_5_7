<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serviceoffert extends Model
{

    protected $guarded = [];
    use SoftDeletes;
}
