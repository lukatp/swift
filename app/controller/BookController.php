<?php

class BookController{
    public function getAll($a){
        // 使用 FUSE
        $book = R::xdispense('book');

        $books = $book->getAll();

        render("book.twig",[
            'title' =>"Books",
            'books' =>$books
        ]);
    }
}