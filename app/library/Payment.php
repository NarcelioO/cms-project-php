<?php

namespace app\library;
use app\interfaces\PaymentInterface;

abstract class Payment {

    public int|float $tax = 0;
    public int|float $value = 0;

    public function setTax() {
        
    }
    public function setValue() {
        
    }

    //metodos abstratos tem que ser publicos
    abstract public function Process();
}