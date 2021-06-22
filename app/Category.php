<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //RELAZIONE CON POSTS
    //CATEGORIES - POSTS ORA
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
