<?php
header("500 Internal Server Error", true, 500);
?>
<div class="container">
    <div class="starter-template text-center">
        <h1>500 error</h1>
        <p class="lead">Runtime error</p>
        <p><?= $message ?></p>
    </div>
</div>

