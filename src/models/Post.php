<?php

namespace app\src\models;

class Post extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "posts";
    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

