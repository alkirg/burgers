<?php
require_once 'Kav/Burgers/Users.php';
require_once 'Kav/Burgers/Orders.php';

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
echo json_encode($_POST);