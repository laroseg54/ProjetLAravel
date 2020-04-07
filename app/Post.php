<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table name 
    protected $table = 'posts'; 
    protected $fillable = [
        'user_id', 'post_content', 'post_title', 'post_status','post_category','post_type','post_name'
    ];

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
