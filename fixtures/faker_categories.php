<?php
include '../app/app.php';

use app\src\models\Categories;

$faker = Faker\Factory::create();

for ($i = 1; $i <= 5; $i++) {
    $categories = new Categories();
    $categories->name = $faker->text(10);
    $categories->description = $faker->text(200);
    $categories->save();
}