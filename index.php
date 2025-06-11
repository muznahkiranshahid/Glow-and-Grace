<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
   
  <style>
    <style>
:root {
  --peach: #ffe1d6;
  --peach-light: #fff5f0;
  --peach-dark: #ffc8b0;
  --black: #000000;
  --text-dark: #2e2e2e;
  --text-accent: #5c4033;
  --card-bg: #fffaf7;
}

/* Base */
body {
  background-color: var(--peach-light);
  color: var(--text-dark);
  font-family: 'Segoe UI', sans-serif;
}

/* Navbar */
.navbar {
  background-color: var(--peach);
  border-bottom: 2px solid var(--black);
}
.navbar-brand,
.nav-link {
  color: var(--black) !important;
  font-weight: 600;
  text-transform: uppercase;
}
.navbar-nav .nav-link:hover {
  color: var(--text-accent) !important;
}

/* Hero */
.hero {
  background: linear-gradient(135deg, var(--peach), #fff);
  padding: 80px 20px;
  text-align: center;
  border-bottom: 2px solid var(--black);
}
.hero h1 {
  font-size: 3rem;
  color: var(--black);
}
.hero p {
  font-size: 1.25rem;
  color: var(--text-accent);
}

/* Headings */
h1, h2, h5 {
  color: var(--black);
  font-weight: bold;
}

/* Products Image Row */
.hover-image-container {
  position: relative;
  width: 100%;
  overflow: hidden;
  border-radius: 10px;
  border: 2px solid #000;
}

.hover-image-container img {
  width: 100%;
  height: auto;
  display: block;
  transition: opacity 0.4s ease;
}

.hover-img {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.hover-image-container:hover .hover-img {
  opacity: 1;
}

.hover-image-container:hover .default-img {
  opacity: 0;
}

.hover-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: #000;
  opacity: 0;
  transition: opacity 0.4s ease;
  font-weight: bold;
  background-color: rgba(255, 255, 255, 0.75);
  padding: 10px 15px;
  border-radius: 10px;
}

.hover-image-container:hover .hover-text {
  opacity: 1;
}



/* Cards */
.card {
  background-color: var(--card-bg);
  border: 2px solid var(--black);
  border-radius: 16px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
.card-title {
  color: var(--black);
  font-size: 1.2rem;
}
.card-text {
  color: var(--text-accent);
}

/* About Section */
section.text-center h2 {
  color: var(--black);
}
section.text-center p {
  color: var(--text-accent);
  max-width: 800px;
  margin: auto;
}

/* Footer Placeholder */
#footer {
  background-color: var(--peach-dark);
  padding: 2rem 0;
  text-align: center;
  color: var(--black);
  border-top: 2px solid var(--black);
  font-weight: 500;
}

/* Optional Scrollbar Styling */
::-webkit-scrollbar {
  width: 8px;
}
::-webkit-scrollbar-thumb {
  background-color: var(--black);
  border-radius: 4px;
}
/* Animations */
      .animate {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease-out;
      }
      .animate.visible {
        opacity: 1;
        transform: none;
      }
      .footer {
        background-color: #7a4e2f;
        color: #ffffff;
      }
  
      .footer-item a {
        color: #ffffff;
        text-decoration: none;
        margin-bottom: 0.5rem;
      }
  
      .footer-item a:hover {
        color: #ffd4c3;
      }
  
</style>

  </style>
</head>
<body>

  <!-- Sticky Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">Glow & Grace</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Cosmetics</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Jewelry</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Luxury You Deserve</h1>
      <p>Discover the perfect blend of elegance and beauty with our premium cosmetics & jewelry.</p>
    </div>
  </section>
<section>
  <div class="container">
    <div class="container">
      <h1>Our Products</h1>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="container">
                    <a href="cosmetic-product.php">
                      <div class="hover-image-container">
  <img src="./images/cosmetics/img1.png" alt="Cosmetics Image" class="default-img">
  <img src="./images/cosmetics/img2.jpg" alt="Cosmetics Hover Image" class="hover-img">
  <div class="hover-text">
    <h4>Cosmetics</h4>
    <p>Enhance your natural beauty with our finest picks.</p>
  </div>
</div>
                    </a>


        </div>
      </div>
      <div class="col-md-6">
        <div class="container">
          <a href="jewelery.php">          
            <div class="hover-image-container">
              <img src="./images/jewels/img1.jpg" alt="Cosmetics Image" class="default-img">
              <img src="./images/jewels/img2.jpg" alt="Cosmetics Hover Image" class="hover-img">
              <div class="hover-text">
                <h4>Jewelery</h4>
                <p>Enhance your natural beauty with our finest picks.</p>
              </div>
            </div>        
          </a>
</div>
      </div>
    </div>
  </div>
</section>
  <!-- Products Section -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4 justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="card p-3">
            <img src="images/jewels/p2.jpg" class="card-img-top rounded" alt="Lipstick">
            <div class="card-body text-center">
              <h5 class="card-title">Velvet Matte Lipstick</h5>
              <p class="card-text">Rich, long-lasting shades for every occasion.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card p-3">
            <img src="images/jewels/p1.jpg" class="card-img-top rounded" alt="Necklace">
            <div class="card-body text-center">
              <h5 class="card-title">Golden Pearl Necklace</h5>
              <p class="card-text">Timeless elegance in every detail.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card p-3">
            <img src="images/jewels/p3.jpg" class="card-img-top rounded" alt="Eyeshadow">
            <div class="card-body text-center">
              <h5 class="card-title">Peachy Eyeshadow Palette</h5>
              <p class="card-text">Soft and radiant tones for day & night looks.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About / Services Section -->
  <section class="py-5 text-center">
    <div class="container">
      <h2 class="mb-4">Why Choose Glow & Grace?</h2>
      <p class="lead">We bring you handpicked collections of high-quality cosmetics and elegant jewelry that accentuate your beauty and style. From luxurious lipsticks to timeless gold pieces – indulge in affordable luxury with us.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer id="footer">
    <div class="container-fluid footer py-5">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="footer-item">
              <h4 class="mb-4 text-white">Newsletter</h4>
              <p class="text-white">Stay updated on offers, trends, and beauty tips. Join our newsletter now!</p>
              <div class="position-relative mx-auto rounded-pill">
                <input class="form-control rounded-pill border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
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
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="json/repeat.js"></script>
</body>
</html>
