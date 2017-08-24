<?php
namespace app\src\security;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;
use function app\core\persistUser;

use app\core;

function login() {
    if (!isset($_POST['userName']) || !isset($_POST['userPassword'])) {
        core\addFlash('danger', 'Not enough parameters');
        core\redirect('main_page');
    }
    if (!($user = loadUserByUsername($_POST['userName']))) {
        core\addFlash('danger', 'Username or password are incorrect');
        core\redirect('main_page');
    }
    if ($_POST['userPassword'] != $user['password']) {
        core\addFlash('danger', 'Username or password1 are incorrect');
        core\redirect('main_page');
    }
    core\persistUser($user);
    core\addFlash('success', sprintf('Hi %s !', $_POST['userName']));
    core\redirect('main_page');
}

function loadUserByUsername($username) {
    global $app;
    /** @var \PDO $DBH */
    $DBH = $app['db'];
    $STH = $DBH->prepare('SELECT * FROM users WHERE name=:userName');
    $STH->bindParam(":userName", $username);
    $STH->execute();
    $users = $STH->fetchAll(\PDO::FETCH_ASSOC);
    return current($users);
}

function registrationPage() {
    return renderView(['layouts/default_layout_with_sidebar.php', 'registration.php']);
}

function registration() {
    global $app;

    /** @var \PDO $dbh */
    $DBH = $app['db'];

    if (!isset($_POST['userLogin']) || !isset($_POST['userPassword']) || !isset($_POST['userEmail'])) {
        addFlash('danger', 'Not enough data');
        redirect('registrationPage');
    }
    if (loadUserByUsername($_POST['userLogin'])) {
        addFlash('danger', 'User name is busy');
        redirect('registrationPage');
    }

    $password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
    $STH = $DBH->prepare("INSERT INTO users (name, password, email) VALUES (:name, :password, :email)");
    $STH->bindParam(":name", $_POST["userLogin"]);
    $STH->bindParam(':password', $password);
    $STH->bindParam(":email", $_POST["userEmail"]);
    $STH->execute();
    persistUser(loadUserByUsername($_POST["userLogin"]));
    addFlash('success', sprintf('welcome ' . $_POST['userLogin'] ));
    redirect('main_page');

}

function adminPanel() {
    global $app;

    /** @var $DBH \PDO */
    $DBH = $app['db'];
    $STH = $DBH->prepare("SELECT * FROM posts WHERE user_id=:userId");
    $STH->bindParam(':userId', $app['user']['id']);
    $STH->execute();
    $posts = $STH->fetchAll();

    return renderView(['layouts/default_layout.php', 'adminPanel.php'], ['posts' => $posts]);
}

function logOut() {
    clearUserDara();
    redirect('main_page');
}