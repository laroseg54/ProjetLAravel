<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table name 
    protected $table = 'posts'; 


    /**
    * Get the user that authored the post.
    */

    public function author() 
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function comments() {
        return $this->hasMany('App\Comment');
    }
    
}
