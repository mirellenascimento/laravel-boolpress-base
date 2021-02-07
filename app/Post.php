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

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    protected $fillable = ['category_id', 'title', 'author'];

}
