<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    //table name
    protected $table = 'posts';
    //primary key
    public $primarykey = 'id';
    //timestamps
    public $timestamps = true ;
    
    public function user(){
        return $this->belongsto('App\User');
    }
}
