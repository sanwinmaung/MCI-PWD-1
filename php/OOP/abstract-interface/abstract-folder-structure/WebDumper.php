<?php

require "Dumper.php";

class WebDumper extends Dumper
{
    public function dump($data)
    {
        var_dump($data);
    }

    public function log($data)
    {
        echo $data;
    }
}

$webDumper = new WebDumper();
$webDumper->dump('PHP abstract class is awesome!');
$webDumper->log("Web Dumper abstract class log!");
echo "<br>";