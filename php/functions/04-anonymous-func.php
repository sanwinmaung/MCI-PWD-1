<?php

$sayHi = function () {
    echo 'Hi!' . '<br>';
};

$greeting = function ($message) {
    echo $message . '<br>';
};

$sayHi();
$greeting('Hello World!');