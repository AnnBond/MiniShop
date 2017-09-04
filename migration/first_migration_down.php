<?php
include '../app/app.php';
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->drop('posts');
Capsule::schema()->drop('categories');
Capsule::schema()->drop('users');