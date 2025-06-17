<!-- breadcrumb.php -->
<link rel="stylesheet" href="./style/style.css">

<div class="breadcrumb-bar">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">
    <!-- Breadcrumb Trail -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
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

    <!-- Right-side Icons -->
    <div class="nav-icons d-flex align-items-center">
      <a href="profile.php" aria-label="Profile"><i class="fas fa-user"></i></a>
      <a href="cart.php" aria-label="Cart"><i class="fas fa-shopping-cart"></i></a>
      <a href="login.php" aria-label="Login"><i class="fas fa-sign-in-alt"></i></a>
    </div>
  </div>
</div>
