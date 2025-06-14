<?php session_start(); ?>
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
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
      echo "<ul class='list-group'>";
      $total = 0;
      foreach ($_SESSION['cart'] as $item) {
        $price = preg_replace('/[^\d.]/', '', $item['price']); // Remove ₹ or other symbols
        $price = floatval($price); // Convert to number safely

        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
        echo htmlspecialchars($item['name']) . "<span>₹" . number_format($price, 2) . "</span>";
        echo "</li>";

        $total += $price;
      }
      echo "</ul><hr>";
      echo "<h5>Total: ₹" . number_format($total, 2) . "</h5>";
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
