<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'] ?? '';

    if (isset($_POST['product_price'])) {
        $cleaned_price = preg_replace('/[^\d.]/', '', $_POST['product_price']);
        $product_price = floatval($cleaned_price);
    } else {
        $product_price = 0;
    }

    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_name'] === $product_name) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    unset($item);

    if (!$found) {
        $_SESSION['cart'][] = [
            'product_name' => $product_name,
            'product_price' => $product_price,
            'quantity' => $quantity
        ];
    }

    header("Location: cart.php");
    exit();
}

?>
