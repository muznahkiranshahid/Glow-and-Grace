<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="images/img1.jpg" type="image/jpg">
  <title>Glow & Grace</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-light: rgb(239, 217, 252);
      --primary-light: rgb(177, 84, 228);
      --primary: #7A1CAC;
      --text-dark: rgb(17, 17, 17);
      --text-light: #fff;
      --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
    }
    body {
      font-family: 'Montserrat', sans-serif;
    }
    .top-bar {
      background-color: var(--primary-light);
      color: var(--text-light);
      padding: 6px 0;
      font-size: 0.9rem;
      text-align: center;
      font-weight: 500;
    }
    .brand-bar {
      background: #fff;
      padding: 10px 0;
      border-bottom: 1px solid #eee;
      box-shadow: var(--shadow);
    }
    .brand {
      font-family: 'Great Vibes', cursive;
      font-size: 2.5rem;
      color: black;
    }
    .icons-container a {
      color: #000;
      margin-left: 15px;
      font-size: 1.2rem;
      position: relative;
      transition: color 0.3s ease;
    }
    .icons-container a:hover {
      color: var(--primary);
    }
    .icons-container .badge {
      font-size: 0.6rem;
      background-color: var(--primary);
    }
    .glass-navbar {
      background: rgba(239, 217, 252, 0.7);
      backdrop-filter: blur(15px);
      border-bottom: 1px solid rgba(122, 28, 172, 0.2);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }
    .navbar-nav .nav-link {
      color: rgba(46, 46, 46, 0.9);
      font-weight: 500;
      margin: 0 8px;
      position: relative;
    }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--primary);
      transition: width 0.3s ease;
    }
    .nav-link:hover::after, .nav-link.active::after {
      width: 100%;
    }
      .glow-btn {
  width: 150px;
  height: 40px;
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
        color: white;

}

.glow-btn:hover {
      color: white!important;
}

.glow-btn:hover::after {
  transform: scaleX(1);
}
    @media (max-width: 575px) {
      .brand {
        font-size: 1.8rem;
      }
    }
  </style>
</head>
<body>

<!-- Top Info -->
<div class="top-bar text-uppercase text-center">
  FREE SHIPPING ON ALL U.S. ORDERS $50+
</div>

<!-- Brand & Icons -->
<div class="container-fluid brand-bar d-flex flex-wrap justify-content-between align-items-center px-3 py-2">
  <!-- Brand -->
  <div class="col-md-4 text-center text-md-start">
    <div class="brand fw-bold" style="letter-spacing: 1px;">
      Glow & Grace
    </div>
  </div>

  <!-- Icons -->
  <div class="col-md-8 d-flex justify-content-end align-items-center gap-3 icons-container">
    <?php if (isset($_SESSION['user_id'])): ?>
      <!-- Profile -->
      <a href="profile.php" title="Profile"><i class="fas fa-user"></i></a>

      <!-- Cart -->
      <?php $cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
      <a href="cart.php" class="position-relative" title="Cart">
        <i class="fas fa-shopping-cart"></i>
        <?php if ($cart_count > 0): ?>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
            <?= $cart_count ?>
          </span>
        <?php endif; ?>
      </a>

      <!-- Logout -->
      <a href="logout.php" class="btn glow-btn d-none d-sm-inline">Logout</a>
      <a href="logout.php" class="text-dark d-inline d-sm-none"><i class="fas fa-sign-out-alt"></i></a>
    <?php else: ?>
      <!-- Login/Register -->
      <a href="login.php" class="btn glow-btn d-none d-sm-inline">Get Access</a>
      <a href="login.php" class="text-dark d-inline d-sm-none"><i class="fas fa-sign-in-alt"></i></a>
    <?php endif; ?>
  </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg glass-navbar sticky-top py-2">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="mainNav">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="cosmetic-product.php">Cosmetics</a></li>
        <li class="nav-item"><a class="nav-link" href="jewelery.php">Jewelry</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>
      <form class="d-flex search-form" method="GET" action="search.php">
        <input class="form-control me-2 border rounded-pill px-3" type="search" name="query" placeholder="Search product" required />
        <button class="btn btn-outline-dark rounded-pill px-3" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
