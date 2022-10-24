<?php

/*
    and     And   $x and $y  // True if both $x and $y are true
    or      Or   $x and $y  // True if either $x or $y is true
*/

$a = 20;
$b = 15;
$c = 10;
$d = 15;

$x = "20";


if( ($a == $b) and ($a == $x) and ($b == $d)  ) { // false and true ==> false
    echo "True And Logical <br>";
} else {
    echo "False And Logical <br>";
}

if( ($a == $b) or ($a == $x) or ($b == $d)  ) { // false and true ==> true
    echo "True Or Logical <br>";
} else {
    echo "False Or Logical <br>";
}

// // if else condition
// if() {
    
// } else {

// }

// // if  elseif condition
// if() {
    
// } elseif() {

// }