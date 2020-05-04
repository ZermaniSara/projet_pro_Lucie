<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function contact(){
        return $this->hasMany('App\Contact','user_id');
    }
    
    public function user_id_e(){
        return $this->hasMany('App\Contact','user_id_e');
    }


    public function mesage(){
        return $this->hasMany('App\Contact','user_id');
    }
    
    public function message(){
        return $this->hasMany('App\Contact','user_id_e');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
