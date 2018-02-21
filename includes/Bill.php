<?php
namespace DWA15;

/*
 * class Bill
 *
 *
 *
 *
 *
 */
 class Bill
{
    /**
     *  Properties
     */
     private $noOfPeople;   # no of people to split the bill
     private $amount;       # amount to split, includes tax
     private $tipRate;      # tip rate
     private $roundUp;      # round up the amount to share to dollar

    /**
     *  Magic method that's invoked whenever an object of this class is instantiated
     */
    public function __construct()
    {
        # Set default properties
        $this->tipRate = 18;    # set default to 18% tip
        $this->roundUp = false;  # round up to dollar
    }
    /*
    public function setTaxRate()
    {
    }

    public function setTipRate()
    {
    }

    public function getFinalBillTotal()
    {
    }

    public function getTaxTotal()
    {
    }

    public function getTipTotal()
    {
    } */

    public function splitBill($splitBy, $totalTap, $tipRate = 0, $roundUp = false)
    {
        $result = $totalTap * (1+($tipRate/100)) / $splitBy;

        if ($roundUp) {
            return ceil($result);
        } else {
            return round($result+0.0049,2);  # couldn't find ceil function with precision, add .0049 to round up
                                                          # i.e. 1.001 -> 1.01, 1.0001 -> 1.01,
                                                          # limitation: 1.00009 -> 1.00, but close enough
        }

    }

}