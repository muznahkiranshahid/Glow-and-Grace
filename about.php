<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>About Us | Glow & Grace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      body {
        font-family: 'Montserrat', sans-serif;
        background: #fff5f0;
        color: #2e2e2e;
      }
      .navbar {
        background: #fff5f0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      }
      .navbar-brand {
        font-family: 'Great Vibes', cursive;
        font-size: 2.2rem;
        color: black !important;
      }
      .navbar-nav .nav-link {
        color: #2e2e2e !important;
        font-weight: 500;
        margin: 0 8px;
      }
      .navbar-nav .nav-link:hover,
      .navbar-nav .nav-link.active {
        color: #ff7c4d !important;
      }

      .about-hero {
        background: #f8d9c5;
        padding: 100px 20px;
        text-align: center;
      }
      .about-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
      }
      .about-hero p {
        max-width: 700px;
        margin: auto;
        font-size: 1.1rem;
        color: #444;
      }

      .mission-section {
        padding: 60px 20px;
      }
      .mission-section h2 {
        font-size: 2.5rem;
        color: #ff7c4d;
        font-weight: bold;
        margin-bottom: 20px;
      }
      .mission-section p {
        font-size: 1.1rem;
        line-height: 1.7;
        max-width: 800px;
        margin: auto;
      }

      .team-section {
        background: rgba(255, 216, 177, 0.3);
        padding: 60px 20px;
      }
      .team-card {
        border: none;
        background: white;
        border-radius: 16px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
      }
      .team-card:hover {
        transform: translateY(-5px);
      }
      .team-card img {
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
      }
      .team-card h5 {
        color: #2e2e2e;
        margin-top: 10px;
      }
      .team-card p {
        color: #ff7c4d;
        font-size: 0.9rem;
      }
.accordion-button {
  background-color: #fff5f0;
  color: #2e2e2e;
  font-weight: 500;
  transition: background-color 0.3s ease, border-color 0.3s ease;
  border: none;
  box-shadow: none;
}

.accordion-button:focus {
  border-color: #ffbb99;
  box-shadow: 0 0 0 0.15rem rgba(255, 124, 77, 0.25);
}

.accordion-button:hover {
  background-color: #ffe6dc;
  color: #ff7c4d;
}

.accordion-button:not(.collapsed) {
  background-color: #ffd4c2;
  color: #ff7c4d;
  box-shadow: none;
}

.accordion-item {
  border: 1px solid #ffd4c2;
  border-radius: 10px;
  overflow: hidden;
}

      #footer {
        background: rgba(255, 216, 177, 0.5);
        padding: 3rem 0;
        color: #2e2e2e;
        backdrop-filter: blur(10px);
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
            <li class="nav-item"><a class="nav-link active" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="cosmetic-product.php">Cosmetics</a></li>
            <li class="nav-item"><a class="nav-link" href="jewelery.php">Jewelry</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- About Hero -->
    <section class="about-hero" data-aos="fade-up">
      <h1>About Glow & Grace</h1>
      <p>Glow & Grace is a celebration of elegance, self-expression, and self-care. From radiant cosmetics to timeless jewelry, we craft each piece with love and purpose to enhance your beauty naturally.</p>
    </section>

    <!-- Mission -->
    <section class="mission-section text-center" data-aos="fade-up">
      <div class="container">
        <h2>Our Mission</h2>
        <p>At Glow & Grace, our mission is to inspire confidence and creativity through beauty. We believe every individual is unique, and our products are designed to highlight what makes you shine. With ethically sourced ingredients and artisan-quality pieces, we empower our customers to express their personal style with grace.</p>
      </div>
    </section>

    <!-- About Section -->
<section id="about" class="py-5">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold">About Glow & Grace</h2>
      <p class="mt-3">Where beauty meets elegance — curated and brought to life by a single passionate founder.</p>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <img src="images/about-owner.jpg" alt="Founder" class="img-fluid rounded-3 shadow">
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <h3 class="mb-3">Meet the Founder</h3>
        <p>
          Hi, I'm <strong>Aarushi Mehta</strong>, the founder and heart behind Glow & Grace.
          With a lifelong love for skincare, beauty, and timeless jewelry, I launched this boutique brand to bring handpicked, high-quality products to women who value both elegance and simplicity.
        </p>
        <p>
          From selecting ingredients that care for your skin to sourcing artisan-crafted jewels, I ensure every product reflects grace, glow, and care. At Glow & Grace, you're not just buying beauty — you're embracing a lifestyle of self-love and radiance.
        </p>
        <a href="contact.php" class="btn btn-cta mt-3">Get In Touch</a>
      </div>
    </div>
  </div>
</section>
<!-- Founder Quote Section -->
<section class="py-5 bg-light-peach text-center" data-aos="fade-up">
  <div class="container">
    <blockquote class="blockquote">
      <p class="fs-4 fst-italic">"Beauty isn't just about appearance — it's about feeling confident, cared for, and gracefully yourself."</p>
      <footer class="blockquote-footer mt-3">Aarushi Mehta, <cite title="Glow & Grace Founder">Founder of Glow & Grace</cite></footer>
    </blockquote>
  </div>
</section>
<!-- FAQ Section -->
<section class="py-5"  data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color: #ff7c4d;">Frequently Asked Questions</h2>
      <p class="text-muted">Find answers to common questions about our products and services.</p>
    </div>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
            Are your cosmetics safe for sensitive skin?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Absolutely. All our products are formulated with gentle, ethically sourced ingredients. They're free from harsh chemicals, parabens, and sulfates, making them suitable for sensitive skin.
          </div>
        </div>
      </div>
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
            Is your jewelry hypoallergenic?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes! Our jewelry is crafted with skin-friendly, hypoallergenic materials such as stainless steel, sterling silver, and gold plating — perfect for everyday wear without irritation.
          </div>
        </div>
      </div>
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
            How long does shipping take?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Orders are typically processed within 1–2 business days. Standard delivery within India takes 3–7 business days. We also offer express shipping at checkout.
          </div>
        </div>
      </div>
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
            Can I return or exchange a product?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            We want you to love what you receive. If you're not satisfied, you can request a return or exchange within 7 days of delivery. Please visit our <a href="contact.php" style="color: #ff7c4d; text-decoration: underline;">Contact Us</a> page for assistance.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- Footer -->
    <footer id="footer">
      <div class="container text-center">
        <p>&copy; 2025 Glow & Grace. All rights reserved.</p>
        <p>
          <a href="#"><i class="fab fa-facebook-f me-3"></i></a>
          <a href="#"><i class="fab fa-instagram me-3"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </p>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>
  </body>
</html>
