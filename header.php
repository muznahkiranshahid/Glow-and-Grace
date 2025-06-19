<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="images/img1.jpg" type="images/img1.jpg">
  <title>Glow & Grace</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --peach-light:rgb(252, 244, 241);
      --peach-base:rgb(255, 254, 254);
      --peach-bold: #f2772f;
      --peach-dark: #ffd8b1;
      --text-dark: #2e2e2e;
      --text-light: #ffffff;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background: var(--peach-light);
      color: var(--text-dark);
      margin: 0;
    }

    .navbar {
      background: rgba(255, 245, 240, 0.8);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid #ffd8b18a;
      box-shadow: 0 4px 16px rgba(255, 173, 137, 0.2);
    }

    .navbar-brand {
      font-family: 'Great Vibes', cursive;
      font-size: 2.4rem;
      color: #f2772f !important;
      letter-spacing: 1px;
    }

    .navbar-nav .nav-link {
      color: var(--text-dark);
      font-weight: 500;
      margin: 0 12px;
      position: relative;
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: #f2772f;
    }

    .navbar-nav .nav-link::after {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: #f2772f;
      transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover::after,
    .navbar-nav .nav-link.active::after {
      width: 100%;
    }

    .breadcrumb-bar {
      background: linear-gradient(to right,var(--peach-dark) , var(--peach-base));
      color: var(--text-dark);
      padding: 20px 0;
      box-shadow: inset 0 -2px 4px rgba(0,0,0,0.1);
    }

    .breadcrumb a {
      color: var(--text-dark);
      font-weight: 500;
      text-decoration: none;
    }

    .breadcrumb-item.active {
      color: #f2772f;
    }
    .breadcrumb:hover {
      color: #f2772f;
    }

    .nav-icons a {
      color: var(--peach-dark);
      font-size: 1.2rem;
      margin-left: 20px;
      transition: color 0.3s ease;
    }

    .nav-icons a:hover {
      color: #f2772f;
    }

    @media (max-width: 576px) {
      .navbar-brand {
        font-size: 1.8rem;
      }

      .nav-icons {
        margin-top: 10px;
        justify-content: center;
        width: 100%;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">Glow & Grace</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="cosmetic-product.php">Cosmetics</a></li>
        <li class="nav-item"><a class="nav-link" href="jewelery.php">Jewelery</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
<?php
        // Get current filename without extension
        $currentPage = basename($_SERVER['PHP_SELF'], ".php");

        // Optional: page name mapping
        $pageNames = [
          'about' => 'About Us',
          'contact' => 'Contact Us',
          'cosmetic-product' => 'Cosmetics',
          'jewelery' => 'Jewelry',
          'cart' => 'Shopping Cart',
          'login' => 'Login',
          'profile' => 'Profile',
          'registeration' => 'Register',
          'admin-dashboard' => 'Admin Panel',
          'cosmetic-details' => 'Cosmetic Details',
          'jewelry-detail' => 'Jewelry Details'
        ];

        // Display if not home
        if ($currentPage !== 'index') {
          $displayName = isset($pageNames[$currentPage])
            ? $pageNames[$currentPage]
            : ucwords(str_replace("-", " ", $currentPage));
          echo '<li class="breadcrumb-item active" aria-current="page">' . htmlspecialchars($displayName) . '</li>';
        }
        ?>
        </ol>
    </nav>
    <div class="nav-icons d-flex align-items-center">

      <a href="profile.php" aria-label="Profile"><i class="fas fa-user"></i></a>
      
<?php
$cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;
?>
<a href="cart.php" aria-label="Cart" class="position-relative">
  <i class="fas fa-shopping-cart"></i>
  <?php if ($cart_count > 0): ?>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
      <?= $cart_count ?>
    </span>
  <?php endif; ?>
</a>
<?php
if (isset($_SESSION['username'])) {
    echo '<a href="logout.php" aria-label="Logout">Logout</a>';
} else {
    echo '<a href="login.php" aria-label="Login">Login</a>';
}
?>

    </div>
  </div>
</div>   
      
<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
