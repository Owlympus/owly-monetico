<?php

require __DIR__ . '/vendor/autoload.php';



try {
    $monetico = new \OwlyMonetico\Monetico(
        2916209,
        '393185ACE600381ACD24E596E822717C05ED389E',
        'ridingwatt'
    );
} catch (Exception $e) {
    die ($e->getMessage());
}

var_dump($monetico->getSecurityKey(), $monetico->getUsableKey());

//$customer = new \OwlyMonetico\Model\Customer();
//$customer
//    ->setCivility('M')
//    ->setFirstName('Yannick')
//    ->setLastName('DUDZIAK')
//    ->setEmail('caution.geek@gmail.com')
//;
//$billingAddress = new \OwlyMonetico\Model\BillingAddress(
//    '755 Vieux Chemin de Sainte-Musse',
//    'La Valette-du-Var',
//    '83160',
//    'France'
//);
//$shippingAddress = new \OwlyMonetico\Model\ShippingAddress(
//    '755 Vieux Chemin de Sainte-Musse',
//    'La Valette-du-Var',
//    '83160',
//    'France'
//);
//
//var_dump([
//    'orderContext' => $orderContext,
//    'paymentRequest' => $paymentRequest
//]);