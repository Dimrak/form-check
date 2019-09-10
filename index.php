<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use App\Helper\Helper;
use App\Controller\FormController;

include 'includes/functions.php';
require __DIR__ . "/vendor/autoload.php";

//Routing
if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
} else {
    $path = '/';
}

$path = explode('/', $path);
$helper = new Helper();

if (isset($path[1]) && !empty($path[1])) {
    $controller = $helper->getController($path[1]);
//    echo $controller;
    if (isset($path[2]) && !empty($path[2])) {
        $method = $path[2];
    } else {
        $method = 'index';
    }
    if (class_exists($controller)) {
        $object = new $controller;
        if (method_exists($object, $method)) {
            if (isset($path[3]) && !empty($path[3])) {
                $id = $path[3];
                $object->{$method}($id);
            } else {
                $object->{$method}();
            }
        } else {
            echo "No page";
        }
    } else {
        echo "No page";
    }

} else {
    $object = new FormController();
    $object->index();
}



