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

      .hero-section {
        background: #f8d9c5;
        padding: 100px 20px;
        font-family: 'Segoe UI', sans-serif;
        color: #111;
      }
      .container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        max-width: 1200px;
        margin: auto;
      }
      .hero-content {
        flex: 1 1 500px;
      }
      .hero-content h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
      }
      .hero-content p {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 30px;
      }
      .countdown {
        display: flex;
        gap: 30px;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 30px;
      }
      .countdown div {
        text-align: center;
      }
      .countdown small {
        display: block;
        font-size: 0.9rem;
        color: #888;
        font-weight: normal;
        margin-top: 5px;
      }
      .cta-btn {
        background: #e6916a;
        color: white;
        padding: 15px 25px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: bold;
        transition: background 0.3s ease;
      }
      .cta-btn:hover {
        background: #d37954;
      }
      .hero-image {
        flex: 1 1 500px;
        text-align: center;
      }
      .hero-image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
      }
      
      .btn-cta {
        background: var(--peach-dark);
        color: #fff;
        padding: 12px 28px;
        border-radius: 30px;
        font-weight: 600;
        transition: background 0.3s;
      }
      .btn-cta:hover {
        background: #e3663f;
      }
.hover-image-container {
  position: relative;
  overflow: hidden;
  border-radius: 16px;
  height: 350px; /* Fixed height for uniform image size */
}

.hover-image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: opacity 0.4s ease;
}

.hover-text {
  position: absolute;
  inset: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: #fff;
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 0;
  transition: opacity 0.4s ease;
  padding: 20px;
  text-align: center;
}

.hover-image-container:hover .hover-text {
  opacity: 1;
}

.hover-text h4 {
  font-size: 2rem;
  margin-bottom: 0.5rem;
}

/* Unique fonts for headings */
.hover-text h4.cosmetics-font {
  font-family: 'Great Vibes', cursive;
}

.hover-text h4.jewelry-font {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 1px;
}

      .card {
        background-color: var(--peach-light);
        border: none;
        border-radius: 16px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      }
      .card-title {
        font-size: 1.2rem;
        color: var(--text-dark);
      }
      .card-text {
        color: var(--text-dark);
      }
      /* Testimonials Section */
      .testimonials-section {
        background: rgba(255, 216, 177, 0.3);
        padding: 80px 0;
      }
      .testimonial-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        margin: 15px;
      }
      .testimonial-text {
        font-style: italic;
        margin-bottom: 20px;
      }
      .testimonial-author {
        display: flex;
        align-items: center;
      }
      .testimonial-author img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
      }
      .author-info h5 {
        margin-bottom: 0;
      }
      .author-info p {
        color: var(--peach-dark);
        margin-bottom: 0;
        font-size: 0.9rem;
      }

      section.text-center h2 {
        color: var(--text-dark);
      }
      section.text-center p {
        color: var(--text-dark);
        max-width: 800px;
        margin: auto;
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
    <nav class="navbar navbar-expand-lg sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#" data-aos="fade-down">Glow & Grace</a>
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
    <!-- Breadcrumb and Icons Bar -->
<div class="breadcrumb-bar">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Current Page</li>
      </ol>
    </nav>

    <!-- Icons Nav -->
    <div class="nav-icons d-flex align-items-center">
      <a href="profile.php" aria-label="Profile"><i class="fas fa-user"></i></a>
      <a href="cart.php" aria-label="Cart"><i class="fas fa-shopping-cart"></i></a>
      <a href="login.php" >Login</a>
    </div>
  </div>
</div>


    <!-- Hero Section -->
    <section class="hero-section" id="home">
      <div class="container">
        <div class="hero-content" data-aos="fade-right" data-aos-duration="800">
          <h1>Discover Beauty Cosmetics<br>That Your Skin Loves</h1>
          <p>Tristique Nostra Mauris Elementum Eget Ante Nec, Consectetur Viverra Leo. Curabitur Sit Amet Dignissim Erat. Aenean Fringilla Pretium Elit, Et Eleifend Orci Cursus.</p>
          
          <div class="countdown">
            <div><span id="days">124</span><small>Days</small></div>
            <div><span id="hours">18</span><small>Hrs</small></div>
            <div><span id="minutes">53</span><small>Mins</small></div>
            <div><span id="seconds">8</span><small>Secs</small></div>
          </div>
          
          <a href="#" class="cta-btn">★ Grab This Offer ★</a>
        </div>
        <div class="hero-image" data-aos="fade-left" data-aos-duration="800">
          <img src="images/img1.jpg" alt="Cosmetic Product">
        </div>
      </div>
    </section>

    <!-- Hover Products -->
    <section id="products">
      <div class="container mt-5">
        <h1 data-aos="fade-up">Our Products</h1>
        <div class="row">
          <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
  <a href="cosmetic-product.php">
    <div class="hover-image-container">
      <img src="./images/cosmetics/img3.jpg" class="default-img" alt="Cosmetics Image">
      <img src="./images/cosmetics/img2.jpg" class="hover-img" alt="Cosmetics Hover">
      <div class="hover-text">
        <h4 class="cosmetics-font">Cosmetics</h4>
        <p>Enhance your natural beauty with our finest picks.</p>
      </div>
    </div>
  </a>
</div>

          <div class="col-md-6" data-aos="fade-left" data-aos-delay="100">
  <a href="jewelery.php">
    <div class="hover-image-container">
      <img src="./images/jewels/img1.jpg" class="default-img" alt="Jewelry Image">
      <img src="./images/jewels/img2.jpg" class="hover-img" alt="Jewelry Hover">
      <div class="hover-text">
        <h4 class="cosmetics-font">Jewelery</h4>
        <p>Timeless pieces for every style.</p>
      </div>
    </div>
  </a>
</div>

        </div>
      </div>
    </section>

    <!-- Product Cards -->
    <section class="py-5" id="featured">
      <div class="container">
        <h1 data-aos="fade-up">Our Best Products</h1>
        <div class="row g-4 justify-content-center">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card p-3">
              <img src="images/jewels/p2.jpg" class="card-img-top rounded" alt="Lipstick">
              <div class="card-body text-center">
                <h5 class="card-title">Velvet Matte Lipstick</h5>
                <p class="card-text">Rich, long-lasting shades for every occasion.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card p-3">
              <img src="images/jewels/p1.jpg" class="card-img-top rounded" alt="Necklace">
              <div class="card-body text-center">
                <h5 class="card-title">Golden Pearl Necklace</h5>
                <p class="card-text">Timeless elegance in every detail.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
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

    <!-- Testimonials Section -->
    <section class="testimonials-section py-5" id="testimonials">
      <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">What Our Customers Say</h2>
        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-card">
              <div class="testimonial-text">
                "The lipstick shades are absolutely stunning and long-lasting. I've never received so many compliments!"
              </div>
              <div class="testimonial-author">
                <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah J.">
                <div class="author-info">
                  <h5>Sarah J.</h5>
                  <p>Beauty Blogger</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="testimonial-card">
              <div class="testimonial-text">
                "The pearl necklace is my go-to accessory for every occasion. The quality is exceptional for the price."
              </div>
              <div class="testimonial-author">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Emily R.">
                <div class="author-info">
                  <h5>Emily R.</h5>
                  <p>Fashion Designer</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="testimonial-card">
              <div class="testimonial-text">
                "I love how the eyeshadow palette blends so easily. The colors are perfect for my skin tone!"
              </div>
              <div class="testimonial-author">
                <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Michelle T.">
                <div class="author-info">
                  <h5>Michelle T.</h5>
                  <p>Makeup Artist</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section class="py-5 text-center" id="about">
      <div class="container">
        <h2 class="mb-4" data-aos="fade-up">Why Choose Glow & Grace?</h2>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">We bring you handpicked collections of high-quality cosmetics and elegant jewelry that accentuate your beauty and style. From luxurious lipsticks to timeless gold pieces – indulge in affordable luxury with us.</p>
      </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
  <div class="container-fluid py-5">
    <div class="container py-4">
      <div class="row g-5">
        <!-- Newsletter -->
        <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up">
          <div class="footer-item">
            <h4 class="mb-4">Newsletter</h4>
            <p>Be the first to hear about new arrivals, exclusive deals, and beauty tips!</p>
            <div class="position-relative">
            <a href="login.php">
              <button type="button" class="btn footer-btn rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">Sign Up</button></a>
            </div>
          </div>
        </div>

        <!-- Services -->
        <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
          <div class="footer-item d-flex flex-column">
            <h4 class="mb-4">Shop Categories</h4>
            <a href="#"><i class="fas fa-angle-right me-2"></i> Skincare Products</a>
            <a href="#"><i class="fas fa-angle-right me-2"></i> Makeup Kits</a>
            <a href="#"><i class="fas fa-angle-right me-2"></i> Hair Care</a>
            <a href="#"><i class="fas fa-angle-right me-2"></i> Necklaces</a>
            <a href="#"><i class="fas fa-angle-right me-2"></i> Earrings</a>
            <a href="#"><i class="fas fa-angle-right me-2"></i> Rings</a>
            <a href="#"><i class="fas fa-angle-right me-2"></i> Bridal Collection</a>
          </div>
        </div>

        <!-- Hours & Address -->
        <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
          <div class="footer-item d-flex flex-column">
            <h4 class="mb-4">Store Hours</h4>
            <p class="mb-2">Monday - Friday: <span>10:00 am – 08:00 pm</span></p>
            <p class="mb-2">Saturday: <span>10:00 am – 06:00 pm</span></p>
            <p class="mb-3">Sunday: <span>Closed</span></p>
            <h4 class="my-3">Location</h4>
            <p><i class="fas fa-map-marker-alt me-2"></i> Glow & Grace, Main Street, Lahore, Pakistan</p>
          </div>
        </div>

        <!-- Social & Contact -->
        <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
          <div class="footer-item d-flex flex-column">
            <h4 class="mb-4">Connect with Us</h4>
            <a href="#"><i class="fab fa-facebook-f me-2"></i> Facebook</a>
            <a href="#"><i class="fab fa-instagram me-2"></i> Instagram</a>
            <a href="#"><i class="fab fa-pinterest me-2"></i> Pinterest</a>
            <h4 class="my-3">Contact Us</h4>
            <p><i class="fas fa-envelope me-2"></i> support@glowandgrace.com</p>
            <p><i class="fas fa-phone me-2"></i> (+92) 300 123 4567</p>
          </div>
        </div>
      </div>

      <!-- Footer Bottom -->
      <div class="text-center mt-5 pt-3" data-aos="fade-up">
        <p class="mb-0">&copy; 2025 Glow & Grace. All rights reserved. Crafted with ❤️ for beauty lovers.</p>
      </div>
    </div>
  </div>
</footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS  -->
     <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
     <script>
       AOS.init({
         once: false // Ensures animations trigger every time you scroll back
       });
     </script>
    
    
    </script>
  </body>
</html>