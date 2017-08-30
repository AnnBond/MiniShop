<?php
include '../app/app.php';

use app\src\models\Post;

$faker = Faker\Factory::create();

for ($i = 1; $i <= 30; $i++) {
    $post = new Post();
    $post->title = $faker->text(40);
    $post->slug = $faker->text(40);
    $post->description = $faker->text(200);
    $post->cost = $faker->biasedNumberBetween(100, 2000);
    $post->user_id = $faker->biasedNumberBetween(1, 5);
    $post->category_id = $faker->biasedNumberBetween(0, 10);
    $post->created_at = $faker->dateTime();
    $post->updated_at = $faker->dateTime();
    $post->save();
}