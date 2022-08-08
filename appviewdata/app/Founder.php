<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Founder extends Model
{
    protected $guarded = [];
    use SoftDeletes;
}
