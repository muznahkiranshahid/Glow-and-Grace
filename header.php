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
      --bg-light:rgb(239, 217, 252);
      --primary-light: rgb(177, 84, 228);
      --primary: #7A1CAC;
      --text-dark: rgb(17, 17, 17);
      --text-light: #f8f8f8;
      --card-bg:rgb(177, 84, 228);
      --hover-bg: #292929;
      --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
    }
    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
    }
    .top-bar {
      background-color: var(--primary-light);
      color: var(--text-light);
      padding: 6px 0;
      font-size: 0.9rem;
      text-align: center;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
    .brand-bar {
      background: #fff;
      padding: 10px 0;
      border-bottom: 1px solid #eee;
      min-height: 70px;
      box-shadow: var(--shadow);
    }
   .brand {
      font-family: 'Great Vibes', cursive;
      font-size: 2.5rem;
      color: black;
    } 

    .brand-icons {
      font-size: 1.2rem;
    }

    .brand-icons a {
      color: #000;
      margin-left: 15px;
      position: relative;
      transition: color 0.3s ease;
    }

    .brand-icons a:hover {
      color: var(--primary);
    }

    .brand-icons a .badge {
      font-size: 0.6rem;
      background-color: var(--primary) !important;
    }

    .glass-navbar {
      background: var( --bg-light);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--primary);
      box-shadow: var(--shadow);
    }

    .navbar-nav .nav-link {
      color: #2e2e2e;
      font-weight: 500;
      margin: 0 8px;
      transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: var(--primary);
      font-weight: 800;
    }
.fixed-top-nav {
      position: sticky;
      top: 0;
      z-index: 1030;
    }
    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(122, 28, 172, 0.25);
      border-color: var(--primary);
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
}

.glow-btn:hover {
      color: var(--text-light);
}

.glow-btn:hover::after {
  transform: scaleX(1);
}
    

    /* AOS animation shadow match */
    [data-aos] {
      box-shadow: var(--shadow);
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
      .brand {
        font-size: 2rem;
      }

      .navbar-collapse {
        background-color: var(--bg-light);
        padding: 1rem;
          outline: 2px solid var(--primary);
        border-radius: 0.5rem;
        margin-top: 0.5rem;
      }
.navbar-collapse li .nav-item:active{
        background-color: var(--primary-light);
        padding: 1rem;
        outline: 2px solid var(--primary);
        border-radius: 0.5rem;
        margin-top: 0.5rem;
        color: var(--text-light);
      }
      .search-form {
        margin-top: 1rem;
        width: 100%;
      }
    }

    @media (max-width: 767.98px) {
      .brand-bar {
        padding: 8px 0;
      }

      .brand-container {
        text-align: center;
        margin-bottom: 0;
      }

      .breadcrumb-container {
        display: none;
      }

      .breadcrumb-item .a {
        color:var(--primary);
        font-weight:bold;
      }
      .icons-container {
        justify-content: center !important;
      }

      .brand {
        font-size: 1.8rem;
      }
    }

    @media (max-width: 575.98px) {
      .top-bar {
        font-size: 0.75rem;
        padding: 4px 0;
      }

      .brand {
        font-size: 1.6rem;
      }

      .brand-icons a {
        margin-left: 10px;
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

<!-- Top Info Bar -->
<div class="top-bar text-center text-uppercase">
  FREE SHIPPING ON ALL U.S. ORDERS $50+
</div>

<!-- Brand Bar with Breadcrumb + Brand + Icons -->
<div class="container-fluid brand-bar d-flex flex-wrap justify-content-between align-items-center px-3 py-2 ps-5">
  <!-- Breadcrumb -->
  <div class="col-lg-4 col-md-3 py-1 breadcrumb-container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 bg-transparent">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
        <?php
        $currentPage = basename($_SERVER['PHP_SELF'], ".php");
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
        if ($currentPage !== 'index') {
          $displayName = $pageNames[$currentPage] ?? ucwords(str_replace("-", " ", $currentPage));
          echo '<li class="breadcrumb-item active" aria-current="page">' . htmlspecialchars($displayName) . '</li>';
        }
        ?>
      </ol>
    </nav>
  </div>

  <!-- Brand Title -->
  <div class="col-lg-4 col-md-6 col-sm-12 text-center brand-container">
    <div class="brand fw-bold" style="letter-spacing: 1px;">
      Glow & Grace
    </div>
  </div>

  <!-- Icons -->
  <div class="col-lg-4 col-md-3 col-sm-12 text-center d-flex justify-content-center align-items-center gap-3 icons-container ">
    <?php if (isset($_SESSION['username'])): ?>
      <a href="profile.php" class="text-dark"><i class="fas fa-user"></i></a>
      <?php $cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
      <a href="cart.php" class="position-relative text-dark">
        <i class="fas fa-shopping-cart"></i>
        <?php if ($cart_count > 0): ?>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
            <?= $cart_count ?>
          </span>
        <?php endif; ?>
      </a>
      <a href="logout.php" class="btn glow-btn fw-bold d-none d-sm-inline me-4">Logout</a>
      <a href="logout.php" class="text-dark d-inline d-sm-none"><i class="fas fa-sign-out-alt"></i></a>
    <?php else: ?>
      <a href="login.php" class="btn glow-btn  fw-bold d-none d-sm-inline m-2">Get Access</a>
      <a href="login.php" class="text-dark d-inline d-sm-none"><i class="fas fa-sign-in-alt"></i></a>
    <?php endif; ?>
  </div>
</div>

<!-- Glass-Style Sticky Navbar -->
<nav class="navbar navbar-expand-lg glass-navbar fixed-top-nav py-2">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="mainNav">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link px-2 px-xl-3" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link px-2 px-xl-3" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link px-2 px-xl-3" href="cosmetic-product.php">Cosmetics</a></li>
        <li class="nav-item"><a class="nav-link px-2 px-xl-3" href="jewelery.php">Jewelry</a></li>
        <li class="nav-item"><a class="nav-link px-2 px-xl-3" href="contact.php">Contact</a></li>
      </ul>
      <form class="d-flex search-form" method="GET" action="search.php">
        <input class="form-control me-2 border rounded-pill px-3" type="search" name="query" placeholder="Search product" aria-label="Search" required />
        <button class="btn btn-outline-dark rounded-pill px-3" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
</nav>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
