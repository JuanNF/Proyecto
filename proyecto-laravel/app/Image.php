<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected  $table = 'images';
    
    //Relacion One To Many de uno a muchos
    
   public function comments(){
       return $this->hasMany('App\Comment');
   }
   
   //Relacion One to Many
   
   public function likes(){
       return $this->hasMany('App\Like');
   }
   
   //Relacion de muchos a uno
   
   public function user(){
       return $this->belongsTo('App\User', 'user_id');
   }
}
