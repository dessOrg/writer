<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['user_id', 'rate_id', 'topic', 'title', 'pages', 'cost', 'description', 'file', 'video', 'dateline', 'status'];


    public function user() 
    {
      return $this->belongsTo('App\User');
    } 

    public function rate()
    {
      return $this->belongsTo('App\Rate');
    }

    public function invoice ()
    {
      return $this->hasOne('App\Invoice');
    }

    public function hires ()
    {
      return $this->hasMany('App\Hire');
    }

    public function proposals ()
    {
      return $this->hasMany('App\Proposal');
    }
}
