<?php
namespace app\src\controllers\posts;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;
use app\src\models\Post;
use app\src\models\Categories;
use app\src\models\User;

function singlePost($id) {
    $post = Post::with('author', 'category')
        ->where('posts.id', '=', $id)
        ->get()
        ->toArray();

    return renderView(['layouts/default_layout.php', 'posts/singlePost.php'], ['post' => current($post)]);
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

    return renderView(['layouts/default_layout.php', 'posts/editPost.php'], compact('post'));
}

function addPost() {
    global $app;

    $categories = Categories::all()
        ->toArray();

    if (isset($_POST['addPost'])) {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['cost'])) {
            Post::insert(array('title' => $_POST["title"], 'description' => $_POST["description"], 'cost' =>  $_POST["cost"], 'slug' => createSlug($_POST["title"]), 'user_id' => $app['user']['id'], 'category_id' => $_POST["category_id"]));

            addFlash('success', 'Your post was added');
            redirect('adminPanel');
        } else {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $cost = $_POST['cost'];
            $cat = $_POST["category_id"];
            addFlash('warning', 'fill all inputs');
        }
    }

    return renderView(['layouts/default_layout.php', 'posts/addPost.php'] , compact('categories', 'title', 'description', 'cost', 'cat'));
}

function deletePost($id) {
    Post::where('id', '=', $id)
        ->delete();
    addFlash('success', 'Your post was deleted');
    redirect('adminPanel');
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