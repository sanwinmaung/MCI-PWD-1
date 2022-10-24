<?php

trait Preprocessor
{
    public function preprocess()
    {
        echo 'Preprocess...done <br>';
    }
}

trait Compiler
{
    public function compile()
    {
        echo 'Compile code...done <br>';
    }
}

trait Assembler
{
    public function createObjCode()
    {
        echo 'Create Obj code ... done <br>';
    }
}

trait Linker
{
    public function createExec()
    {
        echo 'Create the executable file...done <br>';
    }
}

class IDE
{
    // compose multiple traits
    use Preprocessor, Compiler, Assembler, Linker;

    public function run()
    {
        $this->preprocess();
        $this->compile();
        $this->createObjCode();
        $this->createExec();

        echo 'Execute the file...done <br>';
    }
}

$ide = new IDE();
$ide->run();