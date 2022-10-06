<?php

trait Reader
{
    public function read()
    {
        echo 'Reading....<br>';
    }
}

trait Writer
{
    public function write()
    {
        echo 'Writing....<br>';
    }
}

trait Copier
{
    use Reader, Writer;

    public function copy($message)
    {
        $this->read();
        $this->write();

        echo "$message....<br>";
    }
}

class FileProcess
{
    use Copier;

    public function fileProcessing($message)
    {
        $this->copy($message);
    }
}

$fileProcess = new FileProcess();
$fileProcess->fileProcessing('File read and write process....');