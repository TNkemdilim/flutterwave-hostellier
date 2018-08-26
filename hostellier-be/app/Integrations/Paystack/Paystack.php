<?php

namespace App\Integrations\Paystack;

use Yabacon as YabaconPaystack;

/**
 * Class that handles all paystacks transaction.
 * 
 */
class Paystack
{
    private static $_key;

    public function __construct($privateKey)
    {
        $this->_key = $privateKey;
    }

    /**
     * Verify that a payment was successfully performed.
     *
     * @param String $reference 
     * 
     * @return Array
     */
    public static function verifyTransaction($reference)
    {
        $paystack = new YabaconPaystack\Paystack(env('PAYSTACK_SECRET_KEY'));

        try {
            $transaction = $paystack->transaction->verify(
                [
                    'reference' => $reference,
                ]
            );
        } catch (YabaconPaystack\Paystack\Exception\ApiException $e) {
            return null;
        }

        return $transaction->data;
    }
}
