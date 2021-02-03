<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function connectPostInformation(){
        return $this->hasOne(PostInformation::class);
    }

    public function connectCategory(){
        return $this->belongsTo(Category::class);
    }

}
