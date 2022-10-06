<?php

require_once "Dumper.php";

class ConsoleDumper extends Dumper
{
    public function dump($data)
    {
        var_dump($data);
    }
}

$consoleDumper = new ConsoleDumper();
$consoleDumper->dump('PHP console dumper!');