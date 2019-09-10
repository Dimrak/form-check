<?php
function url($path)
{
   return 'http://194.5.157.101/stack/index.php/' . $path;
}

function debug($data)
{
    echo '<pre>';
    print_r($data);
    die();
}

function urlStyle($path)
{
    return 'http://194.5.157.101/stack/' . $path;
}

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}