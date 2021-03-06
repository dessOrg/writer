<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'username', 'role', 'mobile', 'email', 'password',
    ];
   
     public function profile()
         {
             return $this->hasOne('App\Profile');
     }

    public function invoices ()
    {
      return $this->hasMany('App\Invoice');
    }

    public function logs ()
    {
       return $this->hasMany('App\Log');
    }

    public function hires ()
    {
       return $this->hasMany('App\Hire');
    }

    public function proposals ()
    {
      return $this->hasMany('App\Proposal');
    }

    public function messages()
    {
      return $this->hasMany(Message::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
