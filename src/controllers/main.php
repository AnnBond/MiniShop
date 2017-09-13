<?php
namespace app\src\controllers\main;

use function app\core\renderView;
use function app\core\addFlash;

use app\src\models\Post;

function index() {
    if (isset($_GET['search'])) {
        $posts = Post::with('author', 'category')
            ->where('posts.title', 'LIKE', '%' . $_GET['search'] . '%')
            ->orWhere('posts.description', 'LIKE', '%' . $_GET['search'] . '%')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        addFlash('success', sprintf('Your search results for: ' . $_GET['search']));

    } else {
        $posts = Post::with('author', 'category')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    return renderView(['layouts/default_layout_with_sidebar.php', 'main/main.php'], compact('posts'));
}



