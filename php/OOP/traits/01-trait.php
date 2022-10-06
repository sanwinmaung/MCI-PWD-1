<?php

// keyword - trait
trait Logger
{
    public function log($message)
    {
        echo '<pre>';
        echo date("Y-m-d h:i:s") . ":" . "($message)<br>";
        echo '</pre>';
    }
}

// call in use - use
class BankAccount
{
    use Logger;

    private $accountNumber;

    public function __construct($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        $this->log("A new $accountNumber bank account created!");
    }
}

$bankaccount = new BankAccount('3333-8855-3659');

class User
{
    use Logger;

    public function __construct()
    {
        $this->log('A new user created!');
    }
}
$user = new User();