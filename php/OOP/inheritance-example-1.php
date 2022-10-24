<?php

use BankAccount as GlobalBankAccount;

class BankAccount // Parent Class
{
    private $balance;

    public function getBalance() // getter
    {
        return $this->balance;
    }

    public function getSmallBalance() // getter
    {
        return $this->balance * 0.1;
    }

    public function deposit($amount) // setter
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;
    }
}

$mainAccount = new BankAccount();
// $mainAccount->balance = 20;

class SavingAccount extends BankAccount
{
    private $interestRate = 0.08; // 8%

    public function widthrawCashPerWeek()
    {
        return "1 times withdraw cash per week!";
    }

    public function addInterest()
    {
        $interest = $this->interestRate * $this->getBalance();
        $this->deposit($interest);
    }
}

$account = new SavingAccount();
$account->deposit(1000);
echo $account->getBalance() . "<br>";
echo $account->widthrawCashPerWeek() . "<br>";

echo "******************************<br>";

class SpecialAccount extends BankAccount
{
    private $interestRate = 0.1; // 10%

    public function widthrawCashPerWeek()
    {
        return "unlimited withdraw cash per week!";
    }

    public function withdrawCashFromAtm()
    {
        return "Unlimited withdraw cash from ATM";
    }

    public function addInterest()
    {
        $interest = $this->interestRate * $this->getBalance();
        // $this->balance += $interest;
        $this->deposit($interest);
    }

    public function getWithdrawBalance()
    {
        return $this->getSmallBalance();
    }
}

$specAccount = new SpecialAccount();
$specAccount->deposit(20000);
echo $specAccount->getBalance() . "<br>";
echo $specAccount->widthrawCashPerWeek() . "<br>";
echo $specAccount->withdrawCashFromAtm() . "<br>";
$specAccount->addInterest() . "<br>";
echo $specAccount->getBalance() . "<br>";
echo $specAccount->getWithdrawBalance() . "<br>";