<?php
/**
 * route_name => [path, file, function, methods]
 */

return [
    'main_page' => [
        'path' => '/',
        'file' => '../src/controllers/main.php',
        'function' => 'app\\src\\controllers\\main\\index',
        'methods' => ['GET']
    ],
    'single_post' => [
        'path' => '/category/post/{id}',
        'file' => '../src/controllers/posts.php',
        'function' => 'app\\src\\controllers\\posts\\singlePost',
        'requirements' => [
            'id' => '\d+',
            /*'name' => '[\w\s\d-]+'*/
        ],
        'methods' => ['GET']
    ],
    'login' => [
        'path' => '/login/',
        'file' => '../src/controllers/security.php',
        'function' => 'app\\src\\controllers\\security\\login',
        'methods' => ['POST']
    ],
    'registrationPage' => [
        'path' => '/registration/',
        'file' => '../src/controllers/security.php',
        'function' => 'app\\src\\controllers\\security\\registrationPage',
        'methods' => ['GET']
    ],
    'registration' => [
        'path' => '/registration/',
        'file' => '../src/controllers/security.php',
        'function' => 'app\\src\\controllers\\security\\registration',
        'methods' => ['POST']
    ],
    'adminPanel' => [
        'path' => '/adminPanel/',
        'file' => '../src/controllers/security.php',
        'function' => 'app\\src\\controllers\\security\\adminPanel',
        'methods' => ['GET', 'POST']
    ],
    'logOut' => [
        'path' => '/logOut/',
        'file' => '../src/controllers/security.php',
        'function' => 'app\\src\\controllers\\security\\logOut',
        'methods' => ['GET']
    ],
    'categories' => [
        'path' => '/categories/',
        'file' => '../src/controllers/category.php',
        'function' => 'app\\src\\controllers\\category\\index',
        'methods' => ['GET']
    ],
    'add_post' => [
        'path' => '/adminPanel/AddPost/',
        'file' => '../src/controllers/posts.php',
        'function' => 'app\\src\\controllers\\posts\\addPost',
        'methods' => ['GET', 'POST']
    ],
    'edit_post' => [
        'path' => '/posts/edit/{id}',
        'file' => '../src/controllers/posts.php',
        'function' => 'app\\src\\controllers\\posts\\editPost',
        'methods' => ['GET', 'POST']
    ],
    'delete_post' => [
        'path' => '/posts/delete/{id}',
        'file' => '../src/controllers/posts.php',
        'function' => 'app\\src\\controllers\\posts\\deletePost',
        'methods' => ['GET', 'POST']
    ],
    'categoryById' => [
        'path' => '/category/{id}',
        'file' => '../src/controllers/category.php',
        'function' => 'app\\src\\controllers\\category\\categoryById',
        'methods' => ['GET'],
        'requirements' => [
            'id' => '\d+',
        ],
    ],
];
