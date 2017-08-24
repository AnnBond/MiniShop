<?php
namespace app\src\main;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;

use app\core;

/*
 * show all posts

 * */
function index() {
    global $app;

    /** @var $DBH \PDO */
    $DBH = $app['db'];

    if (isset($_GET['search'])) {
        $STH = $DBH->prepare('SELECT * FROM posts WHERE title LIKE :title OR description LIKE :descr');
        $STH->bindValue(':title', '%' . $_GET['search'] . '%');
        $STH->bindValue(':descr', '%' . $_GET['search'] . '%');

        addFlash('success', sprintf('Your search results for: ' . $_GET['search']));

    } else {
        $STH = $DBH->prepare("SELECT * FROM posts");
    }

    $STH->execute();
    $posts = $STH->fetchAll();
    return renderView(['layouts/default_layout_with_sidebar.php', 'main.php'], ['posts' => $posts]);
}

function loginForm() {
    return renderView(['loginForm.php']);
}

