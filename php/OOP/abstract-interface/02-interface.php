<?php

// collect abstract class
interface Readable
{
    public function read();
}

interface Document extends Readable
{
    public function getContents();
}

interface Writable
{
    public function writable();
}

// concrete class
class Book implements Document, Writable
{
    public function getContents()
    {
    }

    public function read()
    {
    }

    public function writable()
    {
    }
}