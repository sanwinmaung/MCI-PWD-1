<?php

$data = '{"Peter":65,"Harry":80,"John":78,"Clark":90}';
$updateData = json_decode($data);

// json_decode =====> Object (or) Array

// var_dump($data);
// echo "<br>";
// var_dump($updateData);
// echo "<br>";
// echo $updateData->Peter . "<br>";
// echo $updateData->Harry . "<br>";
// echo $updateData->Clark . "<br>";

$book = '{
    "book": {
        "name": "Harry Potter",
        "author": "J.K. Rowling",
        "year": 2000,
        "genre": "Fantasy"
    },
    "fruits": [
        "Apple",
        "Banana",
        "Strawberry",
        "Orange"
    ]
}';

echo "<br>";

$updateBook = json_decode($book);
var_dump($updateBook->book->name);
echo "<br>";
var_dump($updateBook->fruits[0]);

echo "<br>";

$fruits = '{
    "fruites": [
        "Apple",
        "Banana",
        "Strawberry",
        "Orange"
    ]
}';

echo "<br>";

$updateFruites = json_decode($fruits);
var_dump($updateFruites->fruites[0]);