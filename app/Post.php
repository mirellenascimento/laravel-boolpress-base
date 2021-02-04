<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function postInformation(){
        return $this->hasOne(PostInformation::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
