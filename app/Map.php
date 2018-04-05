<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    //
    protected $fillable = ['addr','lat','lng'];
    public $timestamps = false;

}
