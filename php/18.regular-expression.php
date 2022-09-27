<?php

// PHP Regular Expression
// regex Or RegExp

preg_match(); // perform a regualr expression match
preg_match_all(); // perform a global regular expression match


    // Regular Expression Syntax
    // . * ? + [ ] ( ) { } ^ $ | \
    

    // [abc] 	Matches any one of the characters a, b, or c.
    // [^abc] 	Matches any one character other than a, b, or c.
    // [a-z] 	Matches any one character from lowercase a to lowercase z.
    // [A-Z] 	Matches any one character from uppercase a to uppercase z.
    // [a-Z] 	Matches any one character from lowercase a to uppercase Z.
    // [0-9] 	Matches a single digit between 0 and 9.
    // [a-z0-9] 	Matches a single character between a and z or between 0 and 9.

    // Shortcut
    // . 	Matches any single character except newline \n.
    // \d 	matches any digit character. Same as [0-9]
    // \D 	Matches any non-digit character. Same as [^0-9]
    // \s 	Matches any whitespace character (space, tab, newline or carriage return character). Same as [ \t\n\r]
    // \S 	Matches any non-whitespace character. Same as [^ \t\n\r]
    // \w 	Matches any word character (definned as a to z, A to Z,0 to 9, and the underscore). Same as [a-zA-Z_0-9]
    // \W 	Matches any non-word character. Same as [^a-zA-Z_0-9]

// To learn >>> https://www.tutorialrepublic.com/php-tutorial/php-regular-expressions.php