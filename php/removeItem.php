<?php
session_start();
foreach ($_SESSION['cart'] as $item => $value) {
  if ($_POST['id'] == $value->id)
    unset($_SESSION['cart'][$item]);
}
header('Location: ../shop.php');
?>