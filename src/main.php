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
        $STH = $DBH->prepare('SELECT posts.*, categories.name AS category_name FROM posts LEFT JOIN categories ON categories.id=posts.category_id WHERE posts.title LIKE :title OR posts.description LIKE :descr');
        $STH->bindValue(':title', '%' . $_GET['search'] . '%');
        $STH->bindValue(':descr', '%' . $_GET['search'] . '%');

        addFlash('success', sprintf('Your search results for: ' . $_GET['search']));

    } else {
        $STH = $DBH->prepare("SELECT posts.*, categories.name AS category_name FROM posts LEFT JOIN categories ON categories.id=posts.category_id");
    }

    $STH->execute();
    $posts = $STH->fetchAll();

    $STH = $DBH->prepare("SELECT * FROM categories");
    $STH->execute();
    $categories = $STH->fetchAll();

    return renderView(['layouts/default_layout_with_sidebar.php', 'main.php'], ['posts' => $posts, 'categories' => $categories]);
}

function loginForm() {
    return renderView(['loginForm.php']);
}

