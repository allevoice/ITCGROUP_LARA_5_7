<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messaging extends Model
{
    protected $guarded = [];
    use SoftDeletes;

}
