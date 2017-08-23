<?php
include '../app/app.php';

use app\core;

global $app;

$app['route'] = core\getCurrentRoute();

if(!empty($app['route'] )) {
    echo core\renderFile($app['route']['file'], $app['route']['function'], $app['route']['params']);
}

