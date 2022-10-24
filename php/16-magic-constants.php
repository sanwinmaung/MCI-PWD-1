<?php

namespace MyOwnNamespace;


// PHP Magic Constants


echo "Line number " . __LINE__ . "<br>";
echo "Line number " . __LINE__ . "<br>";
echo "Line number " . __LINE__ . "<br>";


echo "The full path of this file is: " . __FILE__ . "<br>";
echo "The full path of this file is: " . __DIR__ . "<br>";

function myFunction()
{
    echo "The function name is - " . __FUNCTION__ . "<br>";
}

function hello()
{
    echo "The function name is - " . __FUNCTION__ . "<br>";
}

myFunction();
hello();

class MyNewClass
{
    public function getClassName()
    {
        return __CLASS__ . "<br>";
    }

    public function helloWorld()
    {
        return __CLASS__ . "<br>";
    }

    public function newMethod()
    {
        return __METHOD__ . "<br>";
    }

    public function getNamespace()
    {
        return "This is namespace " . __NAMESPACE__ . "<br>";
    }
}

$newClass = new MyNewClass();
echo $newClass->getClassName();
echo $newClass->helloWorld();
echo $newClass->newMethod();
echo $newClass->getNamespace();