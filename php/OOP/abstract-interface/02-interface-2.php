<?php

interface Logger
{
    public function log($message);
}

class FileLogger implements Logger
{
    private $handle;
    private $logFile;

    public function __construct($file,  $mode = 'r')
    {
        echo "Construct <br>";
        $this->logFile = $file;
        $this->handle = fopen($file, $mode);
    }

    public function log($message)
    {
        return fwrite($this->handle, $message);
    }

    public function __destruct()
    {
        echo "Destruct <br>";
        // close the file
        if ($this->handle) {
            fclose($this->handle);
        }
    }
}

$fileLogger = new FileLogger('file.txt', 'w');
$fileLogger->log("This is interface example two!");

class Database implements Logger
{
    public function log($message)
    {
        echo "This is database logger";
    }
}