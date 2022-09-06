<?php

$name = "Mg Mg Lay"; // String

// echo "Hey, $name!<br>";
// echo 'Hey, $name!<br>';
echo "IMAP functions are available.\n";
echo "IMAP functions are available.<br />\n";

// echo 'I\'ll be back<br>';

// String Length
$str1 = "Welcome to php class!";
$str_len = strlen($str1);

$str2 = "For web developemnt!";
$str_len2 = strlen($str2);

// Number of Words 
$word_count = str_word_count($str1);
// echo "<br>";
// echo $str_len . " " . $str_len2;

// Replace Text in Strings
$str3 = "This is foundation web development course! foundation";
echo $str3;
echo "<br>";

echo str_replace("foundation", "professional", $str3, $count);
echo "<br>";
echo $count;
echo "<br>";

// Reverse String
$str4 = "Hello World";
echo strrev($str4);
echo "<br>";

// Search text in String
$str5 = "This is Mg Aung! Mg Mg";
echo strpos($str5, "Mg", 2);
echo "<br>";

// echo $str5[0];
// echo "<br>";