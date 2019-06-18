<?php
session_start();
foreach ($_SESSION['cart'] as $item => $value) {
  if ($_POST['id'] == $value->id)
    unset($_SESSION['cart'][$item]);
}
if (count($_SESSION['cart']) == 0){
  $_SESSION['sum_quantity'] = 0;
}
header('Location: ../cart.php');
?>