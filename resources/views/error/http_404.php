<?php
header("HTTP/1.0 404 Not Found", true, 404);
?>
<div class="container">
    <div class="starter-template text-center">
        <h1>404 error</h1>
        <p class="lead">Page not found</p>
        <p><?= $message ?></p>
    </div>
</div>

