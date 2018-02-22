<?php
namespace DWA15;

/*
 * class Bill
 *
 *    This class has one method to : add tip to amount + split by no of people
 *
 *    This class can add more properties and method to :
 *          - collect bills (amount with or without tax)
 *          - apply tax or tips
 *          - estimate expense to purchase with no of people
 *          - split bills in multiple ways ( meal only/meal + drink/drink only)
 */
class Bill
{
    /**
     *  Properties
     */

    /* for use in the future for more generic Bill class
    private $noOfPeople;   # no of people to split the bill
    private $amount;       # amount to split, includes tax  */

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
    /* for use in the future to set properties
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

    /*
     *  splitBill
     *
     *      input: $splitBy - integer: no of ways to split. 1 is min. number which you can use to calculate tips.
     *             $totalTap - decimal number precision to 2.  The amount before tips to split
     *             $tipRate - integer and it will always be one of 0/10/15/18/20/25%
     *             $roundUp - round to nearest dollar
     *
     *      output: integer or decimal precision to 2.  if
     *
     */
    public function splitBill($splitBy, $totalTap, $tipRate = 0, $roundUp = false)
    {
        /*
         *  although the input parameters should not have errors in this project, add error checking for others who
         *  wants to use.
         */
        if ($splitBy < 1 OR $totalTap < 0 OR $tipRate < 0) {
            return -1;      # return indicating error
        } else {
            /* calculate */
            $result = $totalTap * (1 + ($tipRate / 100)) / $splitBy;
        }

        /* round to nearest dollar or up to 1 cent */
        if ($roundUp) {
            return ceil($result);
        } else {
            return round($result + 0.0049, 2);  # couldn't find ceil function with precision, add .0049 to round up
            # i.e. 1.001 -> 1.01, 1.0001 -> 1.01,
            # limitation: 1.00009 -> 1.00, but close enough
        }
    }

}