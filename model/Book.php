<?php

class Model_Book extends RedBeanPHP\SimpleModel
{
    public function getFullDetails()
    {
        return "{$this->title} by {$this->author} ({$this->year})";
    }

    public function getAll()
    {
        return R::findAll('book');
    }
}