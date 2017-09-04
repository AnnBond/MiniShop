<?php
include '../app/app.php';

use app\src\models\User;

$faker = Faker\Factory::create();

for ($i = 1; $i <= 5; $i++) {
    $users = new User();
    $users->name = $faker->text(10);
    $users->password = password_hash('Admin', PASSWORD_BCRYPT);
    $users->email = $faker->email(30);
    $users->imgUser = '/uploads/userFiles/shop-icon.png';
    $users->save();
}