<?php
namespace app\src\category;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;


function index() {
    global $app;

    $DBH = $app['db'];

    $STH = $DBH->prepare("SELECT * FROM categories");
    $STH->execute();
    $categories = $STH->fetchAll();
    return renderView(['layouts/default_layout_with_sidebar.php', 'category.php'], ['categories' => $categories]);
}