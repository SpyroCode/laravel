<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $table='posts';
    // de uno a muchos inversa (muchos a uno)
    public function user(){
        return $this->belongTo('App\User','user_id');
    }

    public function category(){
        return $this-belongTo('App\Category','category_id');
    }
}
