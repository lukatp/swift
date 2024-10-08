<?php

//spl_autoload_register(function ($classname)
//{
//    $dirs = ['./vendor/Twig-3.x/'];
//    foreach ($dirs as $dir) {
//        $filename = $dir . str_replace('\\', '/', $classname) .'.php';
//        var_dump($filename);
//        if (file_exists($filename)) {
//            require_once $filename;
//            break;
//        }
//    }
//});
//


$loader = new \Twig\Loader\FilesystemLoader('templates');

$twig = new \Twig\Environment($loader, [
    'cache' => 'cache',
    'auto_reload' => true,
]);
// Prepare your data
$data = [
    'title' => 'Fruit List',
    'items' => ['Apple', 'Banana', 'Cherry'],
    'show_list' => true,
];


function render($name, $data = [])
{
    global $twig;
    echo $twig->render($name, $data);
}