<?php

namespace app\src\models;

/**
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder create(array $attributes = [])
 * @method public Builder update(array $values)
 */
class Post extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "posts";
    public $timestamps = false;
}