<?php
namespace app\src\controllers\posts;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;
use app\src\models\Post;
use app\src\models\Categories;
use app\src\models\User;

/*
 * Single post
 * */
function singlePost($id) {

    $post = Post::where('posts.id', '=', $id)
        ->leftjoin('categories', function ($join)
    {
        $join->on('categories.id', '=', 'posts.category_id');
    } )
        ->leftjoin('users', function ($join)
    {
        $join->on('users.id', '=', 'posts.user_id');
    } )
        ->select('posts.*', 'categories.name as category_name', 'users.name as user_name')
        ->get()
        ->toArray();

    return renderView(['layouts/default_layout.php', 'singlePost.php'], ['post' => current($post)]);
}

function addView() {
    $categories = Categories::all()
        ->toArray();

    return renderView(['layouts/default_layout.php', 'addPost.php'], ['categories' => $categories]);
}


function editPost($id) {
    $post = Post::all()
        ->where('id', '=', $id)
        ->toArray();

    $post = current($post);
    if (isset($_POST['edit'])) {
        if (!empty($_POST['title']) && !empty($_POST['description'])) {
            Post::where('id', '=', $id)
                ->update(array('title' => $_POST["title"], 'description' => $_POST["description"], 'cost' =>  $_POST["cost"], 'slug' => createSlug($_POST["title"])));
            addFlash('success', 'Your post was updated');
            redirect('single_post', ['name' => $post['title'], 'id' => $post['id']]);
        } else {
            addFlash('warning', 'fill all inputs');
        }
    }

    return renderView(['layouts/default_layout.php', 'editPost.php'], ['post' => $post]);
}

function addPost() {
    global $app;

    if (isset($_POST['addPost'])) {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['cost'])) {
            Post::insert(array('title' => $_POST["title"], 'description' => $_POST["description"], 'cost' =>  $_POST["cost"], 'slug' => createSlug($_POST["title"]), 'user_id' => $app['user']['id'], 'category_id' => $_POST["category_id"]));

            addFlash('success', 'Your post was added');
            redirect('main_page');
        } else {
            addFlash('warning', 'fill all inputs');
            redirect('adminPanel');
        }
    }

    return renderView(['layouts/default_layout.php', 'adminPanel.php']);
}

function deletePost($id) {
    Post::where('id', '=', $id)
        ->delete();
    addFlash('success', 'Your post was deleted');
    redirect('main_page');
}

/**
 * Creating slug
 * @param $name
 * @return string
 */
function createSlug($name) {
    $name = (string) $name;
    $name = function_exists('mb_strtolower') ? mb_strtolower($name) : strtolower($name);
    $name = strtr($name, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'',' ' => '-','/' => '-'));

    return $name;
}