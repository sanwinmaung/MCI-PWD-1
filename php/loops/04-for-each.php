<?php

// For Each Loop
// foreach ($variable as $key => $value) {
//     Execute Code
// }

$single_profile = array(
    "name"      => "John Doe",
    "email"     => "johndoe@gmail.com",
    "age"       => 22,
    "address"   => "No(22), Baker Street, London"
);

// foreach ($single_profile as $key => $value) {
//     echo $key . " : " . $value . "<br>";
// }

// foreach ($single_profile as $value) {
//     echo $value . "<br>";
// }

$profiles = [
    array(
        "name"      => "John Doe",
        "email"     => "johndoe@gmail.com",
        "age"       => 22,
        "address"   => "No(22), Baker Street, London"
    ),
    array(
        "name"      => "Smith",
        "email"     => "smith@gmail.com",
        "age"       => 24,
        "address"   => "No(31), Main Street, New York"
    ),
    array(
        "name"      => "Peter",
        "email"     => "peter@gmail.com",
        "age"       => 25,
        "address"   => "No(33), Main Street, New York"
    )
];

foreach ($profiles as $profile) {
    foreach ($profile as $key => $value) {
        echo ucwords($key) . " : " . $value . "<br>";
    }
    echo "*********************************<br>";
}

// name : John Doe

echo "End For Each Loop!!!";