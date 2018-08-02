<?php

namespace App\Integrations\Flutterwave;
/**
 * Class that handles all flutterwaves transaction.
 * 
 */
class Flutterwave 
{
    private $_key;

    public function  __construct($privateKey)
    {
        $this->_key = $privateKey;
    }

    public function makePurchase($amount, $description) 
    {
        $transactionReference = "";

        return $transactionReference;
    }

    public function verifyTransaction($transactionReference)
    {
        return array();
    }
}
