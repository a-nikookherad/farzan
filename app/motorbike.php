<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class motorbike extends Model
{
    //
    protected $fillable=['make','model',"color",'weight','price','image'];
}
