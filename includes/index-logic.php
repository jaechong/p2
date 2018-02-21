<?php
require('Bill.php');

use DWA15\Bill;

$service = 18;
$roundUp = false;

if (!empty($_GET)) {
    # Get data from the form
    $noOfPeople = $_GET['noOfPeople'];
    $amount = $_GET['amount'];
    $service = $_GET['service'];
    $roundUp = isset($_GET['roundUp']) ? $_GET['roundUp'] : false;

    # Instantiate a new Cipher object
    $bill = new Bill();
    # Use the object to encode the message
    $results = $bill->splitBill($noOfPeople, $amount, $service, $roundUp);
}

