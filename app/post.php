<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //table name 
     protected  $table = 'posts';
     //primary key
     public $primarykey = 'id';
    // timestampe
     public $timestamps = true;

     public function user(){
         return $this->belongsto('App\User');
     }
} 
