<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'body', 'category_id', 'thumbnail'
    ];
    // protected $with = [
    //     'author', 'category', 'tags'
    // ];

    // use Notifiable;

    // protected $casts = [
    //     'created_at' => CreateAtCast::class,
    // ];

    // protected $dates = ['created_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function takeImage()
    {
        return "/storage/" . $this->thumbnail;
    }
}
