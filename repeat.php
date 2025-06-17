<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Glow & Grace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
      :root {
        --peach-light: #fff5f0;
        --peach-base: #ffd8b1;
        --peach-dark:rgb(248, 156, 123);
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
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
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
      .breadcrumb-bar {
  background-color: #ffe1d6;
  border-top: 2px solid #ffd8b1;
  border-bottom: 2px solid #ffd8b1;
  padding: 10px 0;
  font-size: 0.95rem;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
}

.breadcrumb {
  margin-bottom: 0;
  background-color: transparent;
}

.breadcrumb-item + .breadcrumb-item::before {
  color: var(--peach-dark);
}

.breadcrumb a {
  color: var(--text-dark);
  text-decoration: none;
  transition: all 0.3s ease;
}

.breadcrumb a:hover {
  color: var(--peach-dark);
  text-decoration: underline;
}

.nav-icons a {
  color: var(--text-dark);
  margin-left: 18px;
  font-size: 1.2rem;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
}

.nav-icons a:hover {
  color: var(--peach-dark);
}

.nav-icons i {
  margin-right: 6px;
}



      /* Transparent Footer */
      #footer {
        background: rgba(255, 216, 177, 0.5);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 3rem 0;
        color: var(--text-dark);
      }
      
      .footer-item h4 {
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 20px;
        color: var(--peach-dark);
      }
      
      .footer-item h4::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 2px;
        background: var(--peach-dark);
      }
      
      .footer-item a {
        color: var(--text-dark);
        text-decoration: none;
        margin-bottom: 0.8rem;
        display: block;
        transition: all 0.3s ease;
      }
      
      .footer-item a:hover {
        color: var(--peach-dark);
        padding-left: 8px;
      }
      
      .footer-item i {
        color: var(--peach-dark);
        width: 20px;
      }
      
      .footer-input {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 124, 77, 0.3);
      }
      
      .footer-btn {
        background: var(--peach-dark);
        color: white;
        border: none;
      }
      
      .footer-btn:hover {
        background: #e3663f;
      }

      ::-webkit-scrollbar {
        width: 8px;
      }
      ::-webkit-scrollbar-thumb {
        background-color: var(--peach-dark);
        border-radius: 4px;
      }
      @media (max-width: 768px) {
        .container {
          flex-direction: column;
          text-align: center;
        }
      }
    </style>
  </head>

  <body>
     <!-- Navbar -->
    <header id="header"></header>
    <!-- Breadcrumb and Icons Bar -->
<div class="breadcrumb-bar">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Current Page</li>
      </ol>
    </nav>

    <!-- Icons Nav -->
    <div class="nav-icons d-flex align-items-center">
      <a href="profile.php" aria-label="Profile"><i class="fas fa-user"></i> Profile</a>
      <a href="cart.php" aria-label="Cart"><i class="fas fa-shopping-cart"></i> Cart</a>
      <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    </div>
  </div>
</div>


<div class="container-fluid footer py-5">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="footer-item">
              <h4 class="mb-4 text-white">Newsletter</h4>
              <p class="text-white">Stay updated on offers, trends, and beauty tips. Join our newsletter now!</p>
              <div class="position-relative mx-auto rounded-pill">
                <input class="form-control rounded-pill border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                <button type="button" class="btn footer-btn rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="footer-item d-flex flex-column">
              <h4 class="mb-4 text-white">Our Services</h4>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Facials</a>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Waxing</a>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Massage</a>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Mineral Baths</a>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Body Treatments</a>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Aroma Therapy</a>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Stone Spa</a>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="footer-item d-flex flex-column">
              <h4 class="mb-4 text-white">Schedule</h4>
              <p class="text-muted mb-0">Monday: <span class="text-white">09:00 am – 10:00 pm</span></p>
              <p class="text-muted mb-0">Saturday: <span class="text-white">09:00 am – 08:00 pm</span></p>
              <p class="text-muted mb-0">Sunday: <span class="text-white">09:00 am – 05:00 pm</span></p>
              <h4 class="my-4 text-white">Address</h4>
              <p><i class="fas fa-map-marker-alt text-secondary me-2"></i> 123 Ranking Street, New York, USA</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="footer-item d-flex flex-column">
              <h4 class="mb-4 text-white">Follow Us</h4>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Facebook</a>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Instagram</a>
              <a href="#"><i class="fas fa-angle-right me-2"></i> Twitter</a>
              <h4 class="my-4 text-white">Contact Us</h4>
              <p><i class="fas fa-envelope text-secondary me-2"></i> info@example.com</p>
              <p><i class="fas fa-phone text-secondary me-2"></i> (+012) 3456 7890 123</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS  -->
     <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
     <script>
       AOS.init({
         once: false // Ensures animations trigger every time you scroll back
       });
     </script>
    <script src="./json/repeat.js"></script>
    
    </script>
  </body>
</html>