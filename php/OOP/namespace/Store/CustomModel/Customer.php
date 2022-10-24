<?php

namespace Store\CustomModel;

class Customer
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        echo "Customer name is $this->name";
    }
}