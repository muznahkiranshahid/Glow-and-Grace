<?php 
session_start();
require_once 'conn.php';

// Redirect if user not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch user name (instead of 'username')
$user_id = $_SESSION['user_id'];
$user_name = '';
$stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($user_name);
$stmt->fetch();
$stmt->close();

// Handle checkout
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $name = $item['product_name'];
            $price = (float)$item['product_price'];
            $quantity = (int)$item['quantity'];
            $total = $price * $quantity;
            $stmt = $conn->prepare("INSERT INTO purchases (user_id, username, product_name, product_price, quantity, total) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issdii", $user_id, $user_name, $name, $price, $quantity, $total);
            $stmt->execute();
        }
        unset($_SESSION['cart']);
        echo "<script>alert('Order placed successfully!'); window.location='index.php';</script>";
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
      background-color: #f9f0ff;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }
    .cart-box {
      background: #fff;
      border: 2px solid #7A1CAC;
      border-radius: 16px;
      padding: 2rem;
      margin: 2rem auto;
      max-width: 1000px;
      box-shadow: 0 6px 12px rgba(122,28,172,0.1);
    }
    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .quantity-controls button {
      background-color: #7A1CAC;
      color: white;
      border: none;
      padding: 4px 10px;
      border-radius: 6px;
      cursor: pointer;
    }
    .quantity-controls input {
      width: 50px;
      text-align: center;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    .remove-btn {
      color: red;
      cursor: pointer;
      font-weight: bold;
    }
    .badge {
      font-size: 1rem;
      background-color: #7A1CAC;
      color: white;
    }
.glow-btn {
  width: 300px;
  height: 50px;
  border: none;
  cursor: pointer;
  background-color: transparent;
  position: relative;
  outline: 2px solid var(--primary);
  border-radius: 4px;
  color: var(--primary);
  font-size: 16px;
  transition: 0.3s;
  z-index: 1;
  overflow: hidden;
}

.glow-btn::after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color:var(--primary-light);
  z-index: -1;
  transition: 0.3s;
  transform: scaleX(0);
  transform-origin: left;
  border-radius: 4px;
}

.glow-btn:hover {
      color: var(--text-light);
}

.glow-btn:hover::after {
  transform: scaleX(1);
}
    img.product-thumb {
      width: 70px;
      height: auto;
      border-radius: 8px;
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container cart-box">
  <h2 class="mb-4">🛍️ Your Cart</h2>
  <?php if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])): ?>
    <div class="table-responsive">
      <table class="table align-middle text-center">
        <thead class="table-light">
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $index => $item):
              $price = (int)$item['product_price'];
              $qty = (int)$item['quantity'];
              $subtotal = $price * $qty;
              $total += $subtotal;
          ?>
            <tr>
              <td>
                <img src="<?= htmlspecialchars($item['product_image']) ?>" class="product-thumb" alt="">
                <div><?= htmlspecialchars($item['product_name']) ?></div>
              </td>
              <td>Rs. <?= $price ?></td>
              <td>
                <form action="add-to-cart.php" method="post" class="quantity-controls">
                  <input type="hidden" name="product_name" value="<?= htmlspecialchars($item['product_name']) ?>">
                  <input type="hidden" name="product_price" value="<?= $price ?>">
                  <input type="hidden" name="product_image" value="<?= htmlspecialchars($item['product_image']) ?>">
                  <input type="hidden" name="action" value="update">
                  <button type="submit" name="quantity" value="<?= $qty - 1 ?>" <?= $qty <= 1 ? 'disabled' : '' ?>>−</button>
                  <input type="number" value="<?= $qty ?>" readonly>
                  <button type="submit" name="quantity" value="<?= $qty + 1 ?>">+</button>
                </form>
              </td>
              <td><span class="badge">Rs. <?= $subtotal ?></span></td>
              <td>
                <form action="add-to-cart.php" method="post">
                  <input type="hidden" name="product_name" value="<?= htmlspecialchars($item['product_name']) ?>">
                  <input type="hidden" name="action" value="delete">
                  <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <h4 class="text-end mt-4">Total: Rs. <?= $total ?></h4>
    <form method="post" class="d-flex justify-content-between mt-3">
      <a href="index.php" class="btn btn-outline-dark">Continue Shopping</a>
      <button type="submit" name="checkout" class="btn glow-btn">Place Order</button>
    </form>
  <?php else: ?>
    <p>Your cart is empty. <a class="btn" href="index.php">Shop now</a>!</p>
  <?php endif; ?>
</div>

<footer class="text-center py-4">
  <p>&copy; <?= date("Y") ?> MakeHub. All rights reserved.</p>
</footer>
</body>
</html>
