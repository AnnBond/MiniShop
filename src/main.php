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

    $STH = $DBH->prepare("SELECT * FROM posts");
    $STH->execute();
    $posts = $STH->fetchAll();

    return renderView(['layouts/default_layout.php', 'main.php'], ['posts' => $posts]);
}

function categories() {

}