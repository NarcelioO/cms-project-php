<?php



namespace app\payment;
use app\library\Payment;



class PaymentPagSeguro extends Payment {

    public function process(){
        throw new \Exception('Method process() is not implemented.');
    }

}