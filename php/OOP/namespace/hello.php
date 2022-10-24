<?php

require "Store/CustomModel/Customer.php";

use Store\CustomModel\Customer as Cust;

$customer = new Cust('John Doe');
echo $customer->getName();