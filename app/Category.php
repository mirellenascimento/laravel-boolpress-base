<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function connectPost(){
        return $this->hasMany(Post::class);
    }
}
