<?php
require_once 'Kav/Burgers/Users.php';
require_once 'Kav/Burgers/Orders.php';
use Kav\Burgers\Users;
use Kav\Burgers\Orders;

error_reporting(E_ERROR);

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$payment = intval($_POST['payment']);
$callback = isset($_POST['callback']);
$address = '';
if ($_POST['street'])
    $address .= $_POST['street'] . ', ';
if ($_POST['home'])
    $address .= 'д. ' . $_POST['home'] . ', ';
if ($_POST['part'])
    $address .= 'к. ' . $_POST['part'] . ', ';
if ($_POST['appt'])
    $address .= 'кв. ' . $_POST['appt'] . ', ';
if ($_POST['floor'])
    $address .= 'эт. ' . $_POST['floor'] . ', ';
$address = mb_substr($address, 0, -2);

if (!$name || !$phone || !$email || !$address) {
    echo json_encode(['success' => false, 'message' => 'Введите обязательные поля']);
    return;
}
$user = new Users();
$userId = $user->add([
   'name' => $name,
   'phone' => $phone,
   'email' => $email
]);
$order = new Orders();
$orderId = $order->add([
    'user' => $userId,
    'address' => $address,
    'comments' => $comment,
    'change' => $payment === 1,
    'card' => $payment === 2,
    'callback' => isset($callback)
]);
if ($userId && $orderId) {
    $count = $order->countOrdersByUser($userId);
    $message = 'Спасибо, ваш заказ будет доставлен по адресу: ' . $address . '<br>';
    $message .= 'Номер вашего заказа: ' . $orderId . '<br>';
    $message .= 'Это ваш ' . $count . '-й заказ!';
    echo json_encode(['success' => true, 'message' => $message]);
} else {
    echo json_encode(['success' => false, 'message' => 'Ошибка добавления заказа']);
}