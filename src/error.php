<?php

namespace app\src\error;

use app\core;

function httpNotFoundError($message = '')
{
    return core\renderView(['layouts/default_layout.php', 'error/http_404.php'], [
        'message' => $message
    ]);
}

function internalServerError($message = '')
{
    return core\renderView(['layouts/default_layout.php', 'error/http_500.php'], [
        'message' => $message
    ]);
}
