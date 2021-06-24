<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'content'
    ];

    /**
     * RELAZIONE CON CATEGORIES
     * POSTS - CATEGORIES
     */

    public function category() {
       return $this->belongsTo('App\Category');
    }
    /**
     * RELAZIONE CON TAGS
     * POST - TAGS
     */
    public function Tags() {
        return $this->belongsToMany('App\Tag');
    }
} 