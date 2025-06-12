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
        --peach-dark: #ff7c4d;
        --text-dark: #2e2e2e;
      }

      body {
        font-family: 'Montserrat', sans-serif;
        background: var(--peach-light);
        color: var(--text-dark);
      }

      .navbar {
        background: var(--peach-light);
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      }
      .navbar-brand {
        font-family: 'Great Vibes', cursive;
        font-size: 2.2rem;
        color: var(--peach-dark) !important;
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
        padding: 80px 20px;
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
      @media (max-width: 768px) {
        .container {
          flex-direction: column;
          text-align: center;
        }
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
        border-radius: 10px;
        border: 2px solid #000;
      }
      .hover-image-container img {
        width: 100%;
        height: auto;
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

      .card {
        background-color: var(--peach-light);
        border: 2px solid var(--text-dark);
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
        background: rgba(255, 216, 177, 0.7); /* Peach base with transparency */
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-top: 1px solid rgba(255, 124, 77, 0.3); /* Peach dark border */
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
            <li class="nav-item"><a class="nav-link" href="#about" data-aos="fade-down" data-aos-delay="100">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#services" data-aos="fade-down" data-aos-delay="200">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact" data-aos="fade-down" data-aos-delay="300">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
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
    <section>
      <div class="container mt-5">
        <h1 data-aos="fade-up">Our Products</h1>
        <div class="row">
          <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
            <a href="cosmetic-product.php">
              <div class="hover-image-container">
                <img src="./images/cosmetics/img1.png" class="default-img" alt="Cosmetics Image">
                <img src="./images/cosmetics/img2.jpg" class="hover-img" alt="Cosmetics Hover">
                <div class="hover-text">
                  <h4>Cosmetics</h4>
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
                  <h4>Jewelry</h4>
                  <p>Timeless pieces for every style.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Product Cards -->
    <section class="py-5">
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

    <!-- About -->
    <section class="py-5 text-center">
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
            <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up">
              <div class="footer-item">
                <h4 class="mb-4">Newsletter</h4>
                <p>Stay updated on offers, trends, and beauty tips. Join our newsletter now!</p>
                <div class="position-relative">
                  <input class="form-control rounded-pill footer-input py-3 ps-4 pe-5 mb-3" type="text" placeholder="Enter your email">
                  <button type="button" class="btn footer-btn rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
              <div class="footer-item d-flex flex-column">
                <h4 class="mb-4">Our Services</h4>
                <a href="#"><i class="fas fa-angle-right me-2"></i> Facials</a>
                <a href="#"><i class="fas fa-angle-right me-2"></i> Waxing</a>
                <a href="#"><i class="fas fa-angle-right me-2"></i> Massage</a>
                <a href="#"><i class="fas fa-angle-right me-2"></i> Mineral Baths</a>
                <a href="#"><i class="fas fa-angle-right me-2"></i> Body Treatments</a>
                <a href="#"><i class="fas fa-angle-right me-2"></i> Aroma Therapy</a>
                <a href="#"><i class="fas fa-angle-right me-2"></i> Stone Spa</a>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
              <div class="footer-item d-flex flex-column">
                <h4 class="mb-4">Schedule</h4>
                <p class="mb-2">Monday: <span>09:00 am – 10:00 pm</span></p>
                <p class="mb-2">Saturday: <span>09:00 am – 08:00 pm</span></p>
                <p class="mb-3">Sunday: <span>09:00 am – 05:00 pm</span></p>
                <h4 class="my-3">Address</h4>
                <p><i class="fas fa-map-marker-alt me-2"></i> 123 Ranking Street, New York, USA</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
              <div class="footer-item d-flex flex-column">
                <h4 class="mb-4">Follow Us</h4>
                <a href="#"><i class="fab fa-facebook-f me-2"></i> Facebook</a>
                <a href="#"><i class="fab fa-instagram me-2"></i> Instagram</a>
                <a href="#"><i class="fab fa-twitter me-2"></i> Twitter</a>
                <h4 class="my-3">Contact Us</h4>
                <p><i class="fas fa-envelope me-2"></i> info@example.com</p>
                <p><i class="fas fa-phone me-2"></i> (+012) 3456 7890 123</p>
              </div>
            </div>
          </div>
          <div class="text-center mt-5 pt-3" data-aos="fade-up">
            <p class="mb-0">&copy; 2023 Glow & Grace. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    
    <!-- Initialize AOS -->
    <script>
      AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
      });
    </script>
  </body>
</html>