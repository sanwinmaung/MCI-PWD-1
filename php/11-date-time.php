<?php

// Date and Time

// d - Represent day of the month; two digits with leading zeros (01 or 31)
// D - Represent day of the week in text as an abbreviation (Mon to Sun)
// m - Represent month in numbers with leading zeros (01 or 12)
// M - Represent month in text, abbreviated (Jan to Dec)
// y - Represent year in two digits (08 or 14)
// Y - Represent year in four digits (2008 or 2014)


// h - Represent hour in 12-hour format with leading zeros (01 to 12)
// H - Represent hour in in 24-hour format with leading zeros (00 to 23)
// i - Represent minutes with leading zeros (00 to 59)
// s - Represent seconds with leading zeros (00 to 59)
// a - Represent lowercase ante meridiem and post meridiem (am or pm)
// A - Represent uppercase Ante meridiem and Post meridiem (AM or PM)


echo "DATE and TIME";
echo "<br>";

$today = date("d M Y H:i:s");
echo $today . "<br>";

$timestamp = time();
echo $timestamp . "<br>";

$last_time = 1663671752;
echo $last_time . "<br>";
echo date("d M Y H:i:s", $last_time);