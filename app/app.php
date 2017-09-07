<?php
// Includes
include '../core/sessions.php';
include '../core/security.php';
include '../core/routing.php';
include '../core/templating.php';
include '../core/files.php';
include '../core/flash_messages.php';
include '../exceptions/HttpNotFoundException.php';
include '../exceptions/RuntimeException.php';

use Illuminate\Database\Capsule\Manager as Capsule;

include '../vendor/autoload.php';

$capsule = new Capsule;

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Configuring
$app = [
    'kernel.root_dir' => dirname(dirname(__FILE__))
];

$app = array_merge($app, [
    'kernel.view_dir' => $app['kernel.root_dir'] . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views',
    'kernel.src_dir' => $app['kernel.root_dir'] . DIRECTORY_SEPARATOR . 'src',
    'kernel.app_dir' => $app['kernel.root_dir'] . DIRECTORY_SEPARATOR . 'app',
    'kernel.services_dir' => $app['kernel.root_dir'] . DIRECTORY_SEPARATOR . 'services',
    'kernel.uploads_dir' => $app['kernel.root_dir'] . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads',
    'kernel.uploadsUsers_dir' => DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'userFiles'
]);

$app['config']  = require $app['kernel.app_dir'] . DIRECTORY_SEPARATOR . 'config.php';
$app['routes']  = require $app['kernel.app_dir'] . DIRECTORY_SEPARATOR . 'routes.php';
$app['user']  = require $app['kernel.app_dir'] . DIRECTORY_SEPARATOR . 'user.php';

/*$app['db'] = new PDO("mysql:host={$app['config']['db_host']};dbname={$app['config']['db_name']}", $app['config']['db_username'], $app['config']['db_password']);
$app['db']->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );*/
