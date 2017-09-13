<?php
include '../app/app.php';

use app\core;
use app\exceptions\HttpNotFoundException;

global $app;



try {

    $app['route'] = core\getCurrentRoute();
    if ($app['route']['user'] && !$app['user']) {
        core\redirect('main_page');
    }
    echo core\renderFile($app['route']['file'], $app['route']['function'], $app['route']['params']);
} catch (HttpNotFoundException $e) {
    echo core\renderFile('error.php', 'app\\src\\error\\httpNotFoundError', [$e->getMessage()]);
    exit();
} catch (\Exception $e) {
    echo core\renderFile('error.php', 'app\\src\\error\\internalServerError', [$e->getMessage()]);
    exit();
}

