<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['user_id', 'project_id', 'amount'];

    public function user ()
    {
       return $this->belongsTo('App\USer');
    }

    public function project ()
    {
       return $this->hasOne('App\Project');
    }
}
