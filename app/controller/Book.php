<?php

class Book{
    public function getAll(){
        // 使用 FUSE
        $book = R::xdispense('book');

        $books = $book->getAll();

        render("book.twig",[
            'title' =>"Books",
            'books' =>$books
        ]);
    }
}