<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable= ['category', 'hs', 'ug', 'gm', 'gd', 'timeline', 'timeunit', 'timeinhr'];
}
