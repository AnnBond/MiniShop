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
    global $app;

    if (empty($_POST['userLogin']) || empty($_POST['userPassword']) || empty($_POST['userEmail'])) {
        addFlash('danger', 'Not enough data');
        redirect('registrationPage');
    }
    if (loadUserByUsername($_POST['userLogin'])) {
        addFlash('danger', 'User name is exist now');
        redirect('registrationPage');
    }

    $password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
    $file_name = $_FILES['newUserPhoto']['name'];
    $file_tmp = $_FILES['newUserPhoto']['tmp_name'];
    $file_ext = strtolower(end(explode('.', $_FILES['newUserPhoto']['name'])));
    $expensions = array("jpeg", "jpg", "png", "svg");

    if (in_array($file_ext, $expensions)) {
        move_uploaded_file($file_tmp, $app['kernel.uploads_dir'] . '/userFiles/' . DIRECTORY_SEPARATOR . $file_name);
        $userPhoto = "/uploads/userFiles/" . $file_name;
        addFlash('success', 'Your photo was updated');
    }

    User::insert(array('name' => $_POST["userLogin"], 'password' => $password, 'email' =>  $_POST["userEmail"], 'imgUser' => $userPhoto));

    persistUser(loadUserByUsername($_POST["userLogin"]));
    addFlash('success', sprintf('welcome ' . $_POST['userLogin'] ));
    redirect('main_page');
}

function adminPanel() {
    global $app;

    $posts = User::with('postsByUser')
        ->where('id', '=', $app['user']['id'])
        ->get()
        ->toArray();

    $userData= getUserData('user');
    $userId = $userData['id'];

    if (isset($_POST['updateUserData'])) {
        if (!empty($_POST['newUserName']) || !empty($_FILES)) {
            $file_name = $_FILES['userPhoto']['name'];
            $file_tmp = $_FILES['userPhoto']['tmp_name'];
            $file_ext = strtolower(end(explode('.', $_FILES['userPhoto']['name'])));
            $expensions = array("jpeg", "jpg", "png", "svg");
            print_r($file_ext);
            if (in_array($file_ext, $expensions)) {
                move_uploaded_file($file_tmp, $app['kernel.uploads_dir'] . '/userFiles/' . DIRECTORY_SEPARATOR . $file_name);
                $userData['imgUser'] = "/uploads/userFiles/" . $file_name;
                addFlash('success', 'Your photo was updated');
            }

            $userData['name'] = $_POST['newUserName'];
            User::where('id', '=', $userId)
                ->update(array('name' =>  $_POST['newUserName'], 'imgUser' => $userData['imgUser']));
        } else {
            addFlash('warning', 'fill all inputs');
        }

        setUserData('user', $userData);
        addFlash('success', 'Your data was updated');
        redirect('adminPanel');

    }

    return renderView(['layouts/default_layout.php', 'adminPanel.php'], ['posts' => $posts]);
}

function logOut() {
    clearUserDara();
    redirect('main_page');
}
