<?php
namespace app\core;

include '../app/app.php';

function processUpload($file) {
    global $app;

    $file = $_FILES['userPhoto']['name'];
    $file_tmp = $_FILES['userPhoto']['tmp_name'];
    $file_ext = strtolower(end(explode('.', $_FILES['userPhoto']['name'])));
    $expensions = array("jpeg", "jpg", "png", "svg");

    if (in_array($file_ext, $expensions)) {
        move_uploaded_file($file_tmp, $app['kernel.uploads_dir'] . DIRECTORY_SEPARATOR . $file);

        return $userData['imgUser'] = "/uploads/userFiles/" . $file;
    }


}