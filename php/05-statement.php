<?php

/*
If Statement
If Else Statement
If Elseif Else Statement
Switch Case Statement

date(w3school) - https://www.w3schools.com/php/func_date_date.asp
date(php.net) - https://www.php.net/manual/en/function.date.php
*/

// if(condition) {
    //     execute code
    // }
    
    $a = "hello";
    
    if ($a == "Hello") {
        echo "Hello Mg Mg";
        echo "<br>";
    }
    
    $evening = "evening";
    
    $current_time = "evening";
    
    if($evening == $current_time) {
        echo "Hello, Good Evening!";
        echo "<br>";
    }

    // if(condition) {
    //     execute code if condition is true
    // } else {
    //     execute code if condition is false
    // }

    $d = date("D");
    
    // echo "Today is Fri?";
    // echo "<br>";

    // if($d == "Fri") {
    //     echo "Yayy TGIF!";
    // } else {
    //     echo "No, today is " . $d . "!";
    // }
    
    // echo date("H:i:s"); // Hour min second
    // echo "<br>";
    // echo date("d/m/Y H:i:s");  
    // echo "<br>";

    // if(condition 1) {
    //     execute code if condition 1 is true

    // } elseif(condition 2) {
    //     execute code if condition 2 is true
        
    // } else {
    //     execute code if both condition is false
    // }

    echo "Today is Fri or Sunday?";
    echo "<br>";

    if($d == "Fri") {
        echo "Yayy TGIF!";
    } elseif($d == "Sun") {
       echo "Have a nice holiday";
    } else {
        echo "No, today is " . $d . "!";
    }