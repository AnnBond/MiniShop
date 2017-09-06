<?php
namespace app\src\controllers\category;

use function app\core\renderView;
use function app\core\addFlash;

use app\src\models\Categories;
use app\src\models\Post;

function index() {
    $categories = Categories::all()->toArray();
    return renderView(['layouts/default_layout.php', 'category/category.php'], compact('categories'));
}

function listCategories() {
    $categories = Categories::all()->toArray();
    return renderView(['category/listCategories.php'], compact('categories'));
}

function categoryById($categoryId) {
    if (isset($_GET['search'])) {
        $posts = Post::with('author', 'category')
            ->where('category_id', '=', $categoryId)
            ->where('posts.title', 'LIKE', '%' . $_GET['search'] . '%')
            ->orwhere('category_id', '=', $categoryId)
            ->where('posts.description', 'LIKE', '%' . $_GET['search'] . '%')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
        addFlash('success', sprintf('Your search results for: ' . $_GET['search']));

    } else {
        $posts = Post::with('author', 'category')
            ->where('category_id', '=', $categoryId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    return renderView(['layouts/default_layout_with_sidebar.php', 'main/main.php'], compact('posts'));
}
