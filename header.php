<!-- header.php -->
<!-- Include this file in other pages with: <?php include 'header.php'; ?> -->

<!-- Head Dependencies -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

<style>
  :root {
    --peach-light: #fff5f0;
    --peach-base: #ffd8b1;
    --peach-dark: #ff7c4d;
    --text-dark: #2e2e2e;
  }

  body {
    font-family: 'Montserrat', sans-serif;
    background: var(--peach-light);
    color: var(--text-dark);
    scroll-behavior: smooth;
  }

  .navbar {
    background: var(--peach-light);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  .navbar-brand {
    font-family: 'Great Vibes', cursive;
    font-size: 2.2rem;
    color: black !important;
  }

  .navbar-nav .nav-link {
    color: var(--text-dark) !important;
    font-weight: 500;
    position: relative;
    margin: 0 8px;
    transition: all 0.3s ease;
  }

  .navbar-nav .nav-link:hover,
  .navbar-nav .nav-link.active {
    color: var(--peach-dark) !important;
  }

  .navbar-nav .nav-link::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: var(--peach-dark);
    margin-top: 4px;
    border-radius: 1px;
    transition: width 0.3s ease;
  }

  .navbar-nav .nav-link:hover::after,
  .navbar-nav .nav-link.active::after {
    width: 100%;
  }

  /* Breadcrumb and Icon Bar */
  .breadcrumb-bar {
    background-color: rgba(255, 215, 185, 0.5);
    padding: 0.75rem 1rem;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
  }

  .breadcrumb {
    margin-bottom: 0;
    background: transparent;
    font-size: 0.95rem;
  }

  .breadcrumb a {
    color: var(--peach-dark);
    text-decoration: none;
    transition: all 0.3s;
  }

  .breadcrumb a:hover {
    text-decoration: underline;
  }

  .nav-icons a {
    color: var(--text-dark);
    margin-left: 15px;
    font-size: 1.2rem;
    transition: color 0.3s ease;
  }

  .nav-icons a:hover {
    color: var(--peach-dark);
  }

  @media (max-width: 576px) {
    .nav-icons {
      margin-top: 10px;
      justify-content: center;
      width: 100%;
    }
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php" data-aos="fade-down">Glow & Grace</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="about.php" data-aos="fade-down" data-aos-delay="100">About</a></li>
        <li class="nav-item"><a class="nav-link" href="cosmetic-product.php" data-aos="fade-down" data-aos-delay="200">Cosmetics</a></li>
        <li class="nav-item"><a class="nav-link" href="jewelery.php" data-aos="fade-down" data-aos-delay="250">Jewelery</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php" data-aos="fade-down" data-aos-delay="300">Contact us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Breadcrumb & Icons -->
<div class="breadcrumb-bar">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Current Page</li>
      </ol>
    </nav>
    <div class="nav-icons d-flex align-items-center">
      <a href="profile.php" title="User"><i class="fas fa-user"></i></a>
      <a href="cart.php" title="Cart"><i class="fas fa-shopping-cart"></i></a>
    </div>
  </div>
</div>
