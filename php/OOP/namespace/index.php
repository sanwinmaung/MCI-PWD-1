<?php

require "Store/Model/Customer.php";
require "Store/CustomModel/Customer.php";

use Store\Model\Customer;
use Store\CustomModel\Customer as Cust; // set custom name

$customer = new Customer('John Doe');
echo $customer->getName();
echo "<br>";

$cust = new Cust('John Doe');
echo $cust->getName();