document.getElementById(
    "header"
  ).innerHTML = `  
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
`;

  // FOOTER
  document.getElementById("footer").innerHTML = `<div class="container-fluid footer py-5">
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
    </div>`;