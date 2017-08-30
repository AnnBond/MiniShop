<?php
include '../app/app.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('posts', function (Illuminate\Database\Schema\Blueprint $table) {
    // Auto-increment id
    $table->increments('id');
    $table->string('title');
    $table->string('slug');
    $table->string('description');
    $table->integer('cost');
    $table->timestamps();
    $table->integer('user_id');
    $table->integer('category_id');
});

Capsule::schema()->create('users1', function (Illuminate\Database\Schema\Blueprint $table) {
    // Auto-increment id
    $table->increments('id');
    $table->string('name');
    $table->string('password');
    $table->string('email');
    $table->integer('imgUser');
});

Capsule::schema()->create('categories', function (Illuminate\Database\Schema\Blueprint $table) {
    // Auto-increment id
    $table->increments('id');
    $table->string('name');
    $table->string('description');
});

Capsule::schema()->create('users', function (Illuminate\Database\Schema\Blueprint $table) {
    // Auto-increment id
    $table->increments('id');
    $table->string('name')->unique();
    $table->string('password');
    $table->string('email')->unique();
    $table->string('imgUser');
});

