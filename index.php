<?php
require 'vendor/autoload.php';
require "core/db.php";
require "core/template.php";

DbConnection::connect();
DbConnection::autoload();

function parseUrl($url) {
    $parsedUrl = parse_url($url);
    $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '/';
    $pathSegments = explode('/', trim($path, '/'));

    $controller = isset($pathSegments[0]) && !empty($pathSegments[0]) ? $pathSegments[0] : 'default';
    $action = isset($pathSegments[1]) && !empty($pathSegments[1]) ? $pathSegments[1] : 'index';

    $queryParams = [];
    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
    }

    return [$controller, $action, $queryParams];
}

$url = $_SERVER['REQUEST_URI'];
list($controller, $action, $params) = parseUrl($url);

$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = 'app/controller/' . $controllerClass . '.php';

if (!file_exists($controllerFile)) {
    die("Controller file not found: $controllerFile");
}

require $controllerFile;

if (!class_exists($controllerClass)) {
    die("Controller class not found: $controllerClass");
}

$controllerInstance = new $controllerClass();

if (!method_exists($controllerInstance, $action)) {
    die("Action not found: $action in $controllerClass");
}

// 调用控制器方法，传递查询参数
$controllerInstance->$action(...$params);
?>