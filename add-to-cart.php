<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product = [
    'name' => $_POST['product_name'],
    'price' => $_POST['product_price']
  ];

  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }

  $_SESSION['cart'][] = $product;

  header("Location: cart.php");
  exit;
}
?>
