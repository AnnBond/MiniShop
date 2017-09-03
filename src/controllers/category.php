<?php
namespace app\src\controllers\category;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;

use app\src\models\Categories;
use app\src\models\Post;

function index() {
    $categories = Categories::all()->toArray();
    return renderView(['layouts/default_layout.php', 'category.php'], ['categories' => $categories]);
}

function listCategories() {
    $categories = Categories::all()->toArray();
    return renderView(['listCategories.php'], ['categories' => $categories]);
}

function categoryById($categoryId) {
    print_r($categoryId);
    if (isset($_GET['search'])) {
        $posts = Post::where('category_id', '=', $categoryId)
            ->where('posts.title', 'LIKE', '%' . $_GET['search'] . '%')
            ->orwhere('category_id', '=', $categoryId)
            ->where('posts.description', 'LIKE', '%' . $_GET['search'] . '%')
            ->leftjoin('categories', function ($join)
            {
                $join->on('categories.id', '=', 'posts.category_id');
            } )
            ->select('posts.*', 'categories.name as category_name')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        print_r($posts);

        addFlash('success', sprintf('Your search results for: ' . $_GET['search']));

    } else {
        $posts = Post::where('category_id', '=', $categoryId)->leftjoin('categories', function ($join)
        {
            $join->on('categories.id', '=', 'posts.category_id');
        } )
            ->select('posts.*', 'categories.name as category_name')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    return renderView(['layouts/default_layout_with_sidebar.php', 'main.php'], ['posts' => $posts]);
}
