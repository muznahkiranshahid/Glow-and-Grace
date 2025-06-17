<?php 
session_start();
require_once 'conn.php';

// Redirect if user not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle Checkout
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $name = $item['product_name'];
            $price = (float)$item['product_price'];
            $quantity = (int)$item['quantity'];
            $total = $price * $quantity;

            $stmt = $conn->prepare("INSERT INTO purchases (user_id, product_name, product_price, quantity, total) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isdid", $user_id, $name, $price, $quantity, $total);
            $stmt->execute();
        }

        // Clear cart after storing
        unset($_SESSION['cart']);
        echo "<script>alert('Order placed successfully!'); window.location='cart.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Your Cart - MakeHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #fff5f0;
      font-family: 'Segoe UI', sans-serif;
      color: #2e2e2e;
    }
    .navbar {
      background-color: #ffe1d6;
      border-bottom: 2px solid #000;
    }
    .navbar-brand, .nav-link {
      color: #000 !important;
      font-weight: 600;
    }
    .cart-box {
      background-color: #fffaf7;
      border: 2px solid #000;
      border-radius: 16px;
      padding: 2rem;
      margin-top: 2rem;
      box-shadow: 0 6px 12px rgba(0,0,0,0.08);
    }
    footer {
      background-color: #ffcab3;
      text-align: center;
      padding: 2rem;
      border-top: 2px solid #000;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">MakeHub</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="cosmetics.php">Cosmetics</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container cart-box">
    <h2>Your Cart</h2>
    <hr>
    <?php
    $total = 0;

    if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        echo "<div class='table-responsive'><table class='table'>";
        echo "<thead><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr></thead><tbody>";

        foreach ($_SESSION['cart'] as $item) {
            $name = isset($item['product_name']) ? $item['product_name'] : 'Unknown';
            $price = isset($item['product_price']) ? (float)$item['product_price'] : 0;
            $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
            $subtotal = $price * $quantity;
            $total += $subtotal;

            echo "<tr>";
            echo "<td>" . htmlspecialchars($name) . "</td>";
            echo "<td>₹" . number_format($price, 2) . "</td>";
            echo "<td>" . $quantity . "</td>";
            echo "<td>₹" . number_format($subtotal, 2) . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table></div>";
        echo "<h5 class='text-end'>Total: ₹" . number_format($total, 2) . "</h5>";
        ?>
        <form method="post">
          <button type="submit" name="checkout" class="btn btn-outline-dark mt-3">Place Order</button>
        </form>
        <?php
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> MakeHub Cosmetics. All rights reserved.</p>
  </footer>
</body>
</html>
