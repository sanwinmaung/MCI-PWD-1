<?php

interface Fly
{
    public function fly();
    // public function voice();
}

class Bird implements Fly
{
    public function fly()
    {
        echo "Bird fly on the air";
    }
}

class Aeroplane implements Fly
{
    public function fly()
    {
        echo "Plane on the air";
    }
}