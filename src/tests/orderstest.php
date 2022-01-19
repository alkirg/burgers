<?php
require_once '../Kav/Burgers/Orders.php';
use Kav\Burgers\Orders;

$orders = new Orders();
echo '<pre>';
$order = $orders->add([
    'user' => 1,
    'address' => 'test address',
    'comments' => 'test comments',
    'change' => true
]);
print_r($orders->getById($order));