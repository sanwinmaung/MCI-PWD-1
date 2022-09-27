<?php

class BankAccount
{
    // access modifiers
    // public, protected, private

    // properties
    public $accountNumber;
    public $balance;

    // methods
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;
    }

    public function withdraw($amount)
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function showBalance()
    {
        return $this->balance;
    }
}

$accountOne = new BankAccount();
$accountOne->accountNumber = '2234';
$accountOne->balance = 3000;

// $object->method(arguments)
$accountOne->deposit(1000);

// echo $accountOne->showBalance();

echo "<br>";

$accTwo = new BankAccount();
$accTwo->accountNumber = '1111';
$accTwo->balance = 200;

// $accTwo->deposit(100);
// $accTwo->deposit(200);
// $accTwo->deposit(300);

// Methods Chaining
$accTwo->deposit(100)
    ->deposit(200)
    ->deposit(300);

$accTwo->deposit(300)
    ->withdraw(200);

// $accTwo->deposit(300);
// $accTwo->withdraw(200);

echo $accTwo->showBalance();