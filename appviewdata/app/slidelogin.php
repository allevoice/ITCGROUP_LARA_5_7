<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class slidelogin extends Model
{
    protected $guarded = [];
    use SoftDeletes;
}
