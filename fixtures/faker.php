<?php
include '../app/app.php';

use app\src\models\User;
use app\src\models\Post;
use app\src\models\Categories;

$faker = Faker\Factory::create();

for ($i = 1; $i <= 10; $i++) {
    $users = new User();
    $users->name = $faker->text(10);
    $users->password = password_hash('Admin', PASSWORD_BCRYPT);
    $users->email = $faker->email(30);
    $users->imgUser = '/uploads/userFiles/shop-icon.png';
    $users->save();
}

for ($i = 1; $i <= 15; $i++) {
    $post = new Post();
    $post->title = $faker->text(40);
    $post->slug = $faker->text(40);
    $post->description = $faker->text(200);
    $post->cost = $faker->biasedNumberBetween(100, 2000);
    $post->user_id = $faker->biasedNumberBetween(1, 5);
    $post->category_id = $faker->biasedNumberBetween(1, 10);
    $post->save();
}

for ($i = 1; $i <= 10; $i++) {
    $categories = new Categories();
    $categories->name = $faker->text(10);
    $categories->description = $faker->text(200);
    $categories->save();
}