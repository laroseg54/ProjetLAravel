<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model


{
    protected $table = 'comments'; 
   
    protected $fillable = [
        'content', 
        'post_id',
        'user_id',
        'parent_id'
    ];

    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function user() {
        return $this->belongsTo('App\User');
    } 

    public function enfants(){
        return $this->hasMany('App\Comment','parent_id', 'id');
    }

    public function pere() {
        return $this->belongsTo('App\Comment','parent_id','id');
    } 

    public function deleteLesEnfants($comment) {
        
        foreach($comment->enfants as $enfant){
            if($enfant->enfants->count()> 0){
                $enfant->deleteLesEnfants($enfant);
            }
            else{
                $enfant->delete();
            }
           
        }

        $comment->delete();
    } 

}

