<?php 
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include DB connection
require_once 'conn.php';

// Fetch user info
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$username = $user['name']; // You can use this for display if needed

// Handle cart operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'] ?? '';
    $product_image = $_POST['product_image'] ?? '';
    $action = $_POST['action'] ?? 'add';

    // Sanitize price
    $product_price = 0;
    if (isset($_POST['product_price'])) {
        $clean_price = preg_replace('/[^\d.]/', '', $_POST['product_price']);
        $product_price = floatval($clean_price);
    }

    $quantity = isset($_POST['quantity']) ? max(1, intval($_POST['quantity'])) : 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Delete item
    if ($action === 'delete') {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['product_name'] === $product_name) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // reindex array
                break;
            }
        }
        header('Location: cart.php');
        exit();
    }

    // Update quantity
    if ($action === 'update') {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product_name'] === $product_name) {
                $item['quantity'] = $quantity;
                break;
            }
        }
        unset($item);
        header('Location: cart.php');
        exit();
    }

    // Add to cart
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
            'product_image' => $product_image,
            'quantity' => $quantity
        ];
    }

    header("Location: cart.php");
    exit();
}
?>
