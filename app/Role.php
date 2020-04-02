<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['role_name'];

    public function roles() 
    {
        return $this->hasMany('App\User');
    }
    
}
