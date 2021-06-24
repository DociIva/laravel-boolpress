<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * RELAZIONE CON POSTS
     * TAG S- POSTS
     */
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
