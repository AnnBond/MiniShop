<?php
namespace app\src\controllers\security;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;
use function app\core\persistUser;

use app\core;

use app\src\models\Post;
use app\src\models\User;

function login() {
    if (!isset($_POST['userName']) || !isset($_POST['userPassword'])) {
        core\addFlash('danger', 'Not enough parameters');
        core\redirect('main_page');
    }
    if (!($user = loadUserByUsername($_POST['userName']))) {
        core\addFlash('danger', 'Username or password are incorrect');
        core\redirect('main_page');
    }
    if (!password_verify((string)$_POST['userPassword'], $user['password'])) {
        core\addFlash('danger', 'Username or password are incorrect');
        core\redirect('main_page');
    }
    persistUser($user);
    core\addFlash('success', sprintf('Hi %s !', $_POST['userName']));
    core\redirect('main_page');
}

function loadUserByUsername($username) {
    $users = User::where('name', '=', $username)
        ->get()
        ->toArray();

    return current($users);
}

function registrationPage() {
    return renderView(['layouts/default_layout.php', 'registration.php']);
}

function registration() {

    if (!isset($_POST['userLogin']) || !isset($_POST['userPassword']) || !isset($_POST['userEmail'])) {
        addFlash('danger', 'Not enough data');
        redirect('registrationPage');
    }
    if (loadUserByUsername($_POST['userLogin'])) {
        addFlash('danger', 'User name is busy');
        redirect('registrationPage');
    }

    $password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);

    User::insert(array('name' => $_POST["userLogin"], 'password' => $password, 'email' =>  $_POST["userEmail"]));

    persistUser(loadUserByUsername($_POST["userLogin"]));
    addFlash('success', sprintf('welcome ' . $_POST['userLogin'] ));
    redirect('main_page');
}

function adminPanel() {
    global $app;
    $posts = Post::where('user_id', '=', $app['user']['id'])
        ->get()
        ->toArray();

    return renderView(['layouts/default_layout.php', 'adminPanel.php'], ['posts' => $posts]);
}

function logOut() {
    clearUserDara();
    redirect('main_page');
}