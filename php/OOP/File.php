<?php

class File
{
    private $handle; // empty

    private $file;

    public function __construct($file,  $mode = 'r')
    {
        echo "Construct <br>";
        $this->file = $file;
        $this->handle = fopen($file, $mode);
    }

    public function __destruct()
    {
        echo "Destruct <br>";
        // close the file
        if ($this->handle) {
            fclose($this->handle);
        }
    }

    public function read()
    {
        return fread($this->handle, filesize($this->file));
    }
}

$note = new File('note.txt');
echo $note->read();