<?php

// Abstract class is a class that cannot be instantiated.
abstract class Dumper
{
    abstract public function dump($data);
}

abstract class ConsoleLogger
{
    abstract public function consoleLogger($data);
}

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


class ConsoleDumper extends Dumper
{
    public function dump($data)
    {
        var_dump($data);
    }
}

$consoleDumper = new ConsoleDumper();
$consoleDumper->dump('PHP console dumper!');