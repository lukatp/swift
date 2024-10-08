<?php

require 'vendor/autoload.php';

require "core/db.php";
require "core/template.php";


DbConnection::connect();
DbConnection::autoload();


$requestUrl = $_SERVER['REQUEST_URI'];

$params = explode("/", $requestUrl);

$controller = ucfirst($params[1]);
$action = $params[2];

require 'app/controller/' . $controller . '.php';

$controllerClass = $controller;
$controllerObject = new (ucfirst($controller))();
$controllerObject->$action();

