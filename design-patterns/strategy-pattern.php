<?php
/*
 * Strategy Pattern example
 * When we have several ways (algorithms) to perform the
 * same operation and we want the application to pick the
 * specific way based on the parameters you have. 
 * This pattern is also known as a policy pattern.
 */
echo "<h1>Strategy Pattern Example </h1>";

interface payStrategy {
    public function pay($amount);
}
 
class payByCC implements payStrategy {
     
    private $ccNum = '';
    private $ccType = '';
    private $cvvNum = '';
    private $ccExpMonth = '';
    private $ccExpYear = '';
     
    public function pay($amount = 0) {
        echo "<h3>Paying ". $amount. " using Credit Card</h3>";
    }
     
}
 
class payByPayPal implements payStrategy {
 
    private $payPalEmail = '';
     
    public function pay($amount = 0) {
        echo "<h3>Paying ". $amount. " using PayPal</h3>";
    }
 
}
 
class shoppingCart {
     
    public $amount = 0;
     
    public function __construct($amount = 0) {
        $this->amount = $amount;
    }
     
    public function getAmount() {
        return $this->amount;
    }
     
    public function setAmount($amount = 0) {
        $this->amount = $amount;
    }
 
    public function payAmount() {
        if($this->amount >= 500) {
            $payment = new payByCC();
        } else {
            $payment = new payByPayPal();
        }
         
        $payment->pay($this->amount);
    }
}
 
$cart = new shoppingCart(499);
$cart->payAmount();
 
$cart = new shoppingCart(501);
$cart->payAmount();