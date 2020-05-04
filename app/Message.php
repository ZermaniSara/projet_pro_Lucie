<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    
    public function user(){
      return $this->belongsTo('App\User','user_id');
  }
  
  public function user_id_e(){
      return $this->belongsTo('App\User','user_id_e','id');
  }


}
