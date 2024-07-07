<?php

function redirect($url, $message)
{
    if ($message != "") {
        $_SESSION['message'] =  $message;
    }
    header('Location: ' . $url);
    exit();
}
function getImage($image)
{
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    return $file_name = time() . '.' . $image_ext;
}
