<?php
namespace app\src\posts;

use function app\core\renderView;
use function app\core\addFlash;
use function app\core\redirect;

/*
 * Single post
 * */
function singlePost($id) {
    global $app;

    $DBH = $app['db'];
    $STH = $DBH->prepare("SELECT posts.*, categories.name AS category_name, users.name AS user_name FROM posts LEFT JOIN categories ON categories.id=posts.category_id LEFT JOIN users ON users.id=posts.user_id  WHERE posts.id = :postId ");
    $STH->bindValue(':postId', $id, \PDO::PARAM_INT);
    $STH->setFetchMode(\PDO::FETCH_ASSOC);
    $STH->execute();
    $post = $STH->fetchAll();

    if(empty($post)) {
        return renderView(['404.php']);
    }
    return renderView(['layouts/default_layout.php', 'singlePost.php'], ['post' => current($post)]);
}

function postsByUserId() {
    global $app;

    $DBH = $app['db'];
    $STH = $DBH->prepare("SELECT * FROM posts WHERE user_id = :userId");
    $STH->bindValue(':user', $app['user']['id'], \PDO::PARAM_INT);
    $STH->setFetchMode(\PDO::FETCH_ASSOC);
    $STH->execute();
    $post = $STH->fetchAll();

    if(empty($post)) {
        return renderView(['404.php']);
    }
}

function addView() {
    global $app;

    $DBH = $app['db'];
    $STH = $DBH->prepare("SELECT * FROM categories");
    $STH->execute();
    $categories = $STH->fetchAll();

    return renderView(['layouts/default_layout.php', 'addPost.php'], ['categories' => $categories]);
}


function editPost($id) {
    global $app;

    /** @var $DBH \PDO */
    $DBH = $app['db'];

    $STH = $DBH->prepare("SELECT * FROM posts WHERE posts.id = :postId");
    $STH->bindValue(':postId', $id, \PDO::PARAM_INT);
    $STH->setFetchMode(\PDO::FETCH_ASSOC);
    $STH->execute();
    $post = $STH->fetchAll();
    if(empty($post)) {
        return renderView(['404.php']);
    }
    $post = current($post);
    if (isset($_POST['edit'])) {
        if (!empty($_POST['title']) && !empty($_POST['description'])) {
            $STH = $DBH->prepare("UPDATE posts SET title=:title, description=:description, cost=:cost, slug = :slug WHERE id= :postId ");
            $STH->bindValue(':postId', $id, \PDO::PARAM_INT);
            $STH->bindValue(':slug', createSlug($_POST["title"]));
            $STH->bindParam(":title", $_POST["title"]);
            $STH->bindParam(":description", $_POST["description"]);
            $STH->bindParam(":cost", $_POST["cost"]);
            $STH->execute();
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

    /** @var $DBH \PDO */
    $DBH = $app['db'];
    if (isset($_POST['addPost'])) {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['cost'])) {
            $STH = $DBH->prepare("INSERT INTO posts (title, description, slug, cost, created_at, user_id, category_id) VALUES (:title, :description, :slug, :cost, CURRENT_TIMESTAMP(), :user_id, :category_id)");
            $STH->bindParam(":title", $_POST["title"]);
            $STH->bindValue(':slug', createSlug($_POST["title"]));
            $STH->bindParam(":description", $_POST["description"]);
            $STH->bindParam(":cost", $_POST["cost"]);
            $STH->bindParam(":user_id", $app['user']['id']);
            $STH->bindParam(":category_id", $_POST["category_id"]);
            $STH->execute();
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
    global $app;

    /** @var $DBH \PDO */
    $DBH = $app['db'];
    $STH = $DBH->prepare("DELETE FROM posts WHERE id = :id");
    $STH->bindValue(':id', $id);
    $STH->execute();

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