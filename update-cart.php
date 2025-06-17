<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $name = $_POST['product_name'] ?? '';

    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['product_name'] === $name) {
            if ($action === 'increase') {
                $_SESSION['cart'][$index]['quantity']++;
            } elseif ($action === 'decrease') {
                if ($_SESSION['cart'][$index]['quantity'] > 1) {
                    $_SESSION['cart'][$index]['quantity']--;
                }
            } elseif ($action === 'remove') {
                unset($_SESSION['cart'][$index]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index
            }
            break;
        }
    }
}

header("Location: cart.php");
exit();
?>
