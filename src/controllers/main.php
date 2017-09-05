<?php
namespace app\src\controllers\main;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;
use function app\core\getCurrentRoute;

use app\core;
use app\src\models\Categories;
use app\src\models\Post;

function index() {
    $posts = Post::all();

    if (isset($_GET['search'])) {
        $posts = Post::where('posts.title', 'LIKE', '%' . $_GET['search'] . '%')
            ->orWhere('posts.description', 'LIKE', '%' . $_GET['search'] . '%')
            ->leftjoin('categories', function ($join)
        {
            $join->on('categories.id', '=', 'posts.category_id');
        } )
            ->select('posts.*', 'categories.name as category_name')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        addFlash('success', sprintf('Your search results for: ' . $_GET['search']));

    } else {
        $posts = Post::with('author')->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    return renderView(['layouts/default_layout_with_sidebar.php', 'main.php'], ['posts' => $posts]);
}



