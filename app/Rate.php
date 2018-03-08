<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable= ['category', 'level', 'rates', 'timeline'];


    public function projects ()
    {
       return $this->hasMany('App\Project');
    }
}



