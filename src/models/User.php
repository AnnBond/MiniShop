<?php

namespace app\src\models;

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "users";
    public $timestamps = false;

    public function postsByUser() {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}

