<?php

// class MyClass
// {
// }

// MyClass - name

// anonymouse class
$obj = new class
{
    public $filename;

    public function log($message)
    {
        echo $this->filename . ' ' . $message . "<br>";
    }
};
$obj->filename = 'file-01.txt';
$obj->log('exist under unknown folder!');
var_dump($obj);