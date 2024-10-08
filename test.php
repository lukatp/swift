<?php

require 'vendor/autoload.php';

require "core/db.php";
require "core/template.php";


DbConnection::connect();
DbConnection::autoload();

// 使用 FUSE
$book = R::xdispense('book');

$books = $book->getAll();

render("book.twig",[
    'title' =>"Books",
    'books' =>$books
]);