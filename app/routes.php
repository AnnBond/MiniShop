<?php
/**
 * route_name => [path, file, function, methods]
 */

return [
    'main_page' => [
        'path' => '/',
        'file' => '../src/main.php',
        'function' => 'app\\src\\main\\index',
        'methods' => ['GET']
    ],
    'single_post' => [
        'path' => '/category/post/{id}',
        'file' => '../src/posts.php',
        'function' => 'app\\src\\posts\\singlePost',
        'requirements' => [
            'id' => '\d+',
            /*'name' => '[\w\s\d-]+'*/
        ],
        'methods' => ['GET']
    ],
    'login' => [
        'path' => '/login/',
        'file' => '../src/security.php',
        'function' => 'app\\src\\security\\login',
        'methods' => ['POST']
    ],
    'registrationPage' => [
        'path' => '/registration/',
        'file' => '../src/security.php',
        'function' => 'app\\src\\security\\registrationPage',
        'methods' => ['GET']
    ],
    'registration' => [
        'path' => '/registration/',
        'file' => '../src/security.php',
        'function' => 'app\\src\\security\\registration',
        'methods' => ['POST']
    ],
    'adminPanel' => [
        'path' => '/adminPanel/',
        'file' => '../src/security.php',
        'function' => 'app\\src\\security\\adminPanel',
        'methods' => ['GET', 'POST']
    ],
    'logOut' => [
        'path' => '/logOut/',
        'file' => '../src/security.php',
        'function' => 'app\\src\\security\\logOut',
        'methods' => ['GET']
    ],
    'categories' => [
        'path' => '/categories/',
        'file' => '../src/category.php',
        'function' => 'app\\src\\category\\index',
        'methods' => ['GET']
    ],
    'add_post_page' => [
        'path' => '/AddPost/',
        'file' => '../src/posts.php',
        'function' => 'app\\src\\posts\\addView',
        'methods' => ['GET', 'POST']
    ],
    'add_post' => [
        'path' => '/adminPanel/AddPost/',
        'file' => '../src/posts.php',
        'function' => 'app\\src\\posts\\addPost',
        'methods' => ['POST']
    ],

];
