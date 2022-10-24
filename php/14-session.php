<?php

// PHP Session
// Store data on web server
session_start();

$_SESSION["firstname"] = "John";
$_SESSION["lastname"] = "Doe";

echo "Create Session";