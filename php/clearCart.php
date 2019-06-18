<?php
session_start();
if (isset($_SESSION['cart'])) {
  unset($_SESSION['cart']);
  $_SESSION['sum_quantity'] = 0;
  header('Location: ../shop.php');
}


?>