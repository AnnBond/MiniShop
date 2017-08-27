<?php
/**
 * Created by PhpStorm.
 * User: ANN
 * Date: 8/26/2017
 * Time: 4:05 PM
 */

namespace app\src\models;


class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "users";
    public $timestamps = false;
}