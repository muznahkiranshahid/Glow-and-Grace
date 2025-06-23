<?php  
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>About Us | Glow & Grace</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Fonts and Libraries -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: rgb(177, 84, 228);
      --bg-light: #faefff;
      --bg-lighter: #fef7ff;
      --bg-peach: rgba(177, 84, 228, 0.05);
      --text-dark: #111;
      --text-light: #fff;
      --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-dark);
      line-height: 1.7;
    }

    .about-hero {
      background: linear-gradient(to right, var(--primary-light), #e3bdfc);
      padding: 100px 20px;
      text-align: center;
      color: var(--text-light);
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
    }

    .mission-section {
      background-color: var(--bg-lighter);
      padding: 60px 20px;
    }

    .mission-section h2 {
      font-size: 2.5rem;
      color: var(--primary);
      font-weight: bold;
      margin-bottom: 20px;
    }

    .btn-cta {
      width: 160px;
      height: 45px;
      font-size: 16px;
      font-weight: 600;
      border-radius: 6px;
      color: var(--primary);
      border: 2px solid var(--primary);
      background-color: transparent;
      position: relative;
      overflow: hidden;
      z-index: 1;
      transition: all 0.3s ease;
    }

    .btn-cta::after {
      content: '';
      position: absolute;
      top: 0; left: 0;
      height: 100%; width: 100%;
      background-color: var(--primary-light);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease;
      z-index: -1;
      border-radius: 6px;
    }

    .btn-cta:hover {
      color: var(--text-light);
      border-color: var(--primary-light);
    }

    .btn-cta:hover::after {
      transform: scaleX(1);
    }

    .stats-section {
      background-color: var(--bg-lighter);
      padding: 60px 0;
    }

    .stats-box {
      background: white;
      box-shadow: var(--shadow);
      border-radius: 10px;
      padding: 30px;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .stats-box:hover {
      transform: scale(1.05);
    }

    .stats-box h3 {
      font-size: 2.2rem;
      color: var(--primary);
      font-weight: 700;
    }

    .founder-quote {
      background-color: var(--bg-peach);
    }

    /* Accordion Styling */
    .accordion-item {
      border: 1px solid var(--primary-light);
      border-radius: 10px;
      margin-bottom: 1rem;
      overflow: hidden;
      background-color: white;
    }

    .accordion-button {
      background-color: var(--bg-light)!important;
      color: var(--primary);
      font-weight: 600;
      font-size: 1rem;
      transition: background-color 0.3s, var(--bg-light) 0.3s!important;
    }

    .accordion-button:hover {
      background-color: rgba(177, 84, 228, 0.15);
    }

    .accordion-button:not(.collapsed) {
      background-color: var(--bg-light);
      color: var(--text-light);
      box-shadow: none;
    }

    .accordion-body {
      background-color: var(--bg-lighter);
      color: var(--text-dark);
      font-size: 0.95rem;
    }

    #footer {
      background: rgba(177, 84, 228, 0.15);
      padding: 3rem 0;
      color: var(--text-dark);
      backdrop-filter: blur(10px);
      text-align: center;
    }
  </style>
</head>
<body>

<?php include 'header.php'; ?>

<section class="about-hero" data-aos="fade-up">
  <h1>About Glow & Grace</h1>
  <p>Glow & Grace is a celebration of elegance, self-expression, and self-care. From radiant cosmetics to timeless jewelry, we craft each piece with love and purpose to enhance your beauty naturally.</p>
</section>

<section class="mission-section text-center" data-aos="fade-up">
  <div class="container">
    <h2>Our Mission</h2>
    <p>At Glow & Grace, our mission is to inspire confidence and creativity through beauty. We believe every individual is unique, and our products are designed to highlight what makes you shine. With ethically sourced ingredients and artisan-quality pieces, we empower our customers to express their personal style with grace.</p>
  </div>
</section>

<section class="py-5" style="background-color: white;" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">About Glow & Grace</h2>
      <p class="mt-3">Where beauty meets elegance — curated and brought to life by a single passionate founder.</p>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <img src="images/about-owner.jpg" alt="Founder" class="img-fluid rounded-3 shadow">
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <h3 class="mb-3">Meet the Founder</h3>
        <p>Hi, I'm <strong>Aarushi Mehta</strong>, the founder and heart behind Glow & Grace. With a lifelong love for skincare, beauty, and timeless jewelry, I launched this boutique brand to bring handpicked, high-quality products to women who value both elegance and simplicity.</p>
        <p>From selecting ingredients that care for your skin to sourcing artisan-crafted jewels, I ensure every product reflects grace, glow, and care. At Glow & Grace, you're not just buying beauty — you're embracing a lifestyle of self-love and radiance.</p>
        <a href="contact.php" class="btn btn-cta mt-3">Get In Touch</a>
      </div>
    </div>
  </div>
</section>

<section class="stats-section text-center" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 col-6 mb-4">
        <div class="stats-box">
          <h3>50K+</h3>
          <p>Happy Customers</p>
        </div>
      </div>
      <div class="col-md-3 col-6 mb-4">
        <div class="stats-box">
          <h3>100+</h3>
          <p>Handpicked Products</p>
        </div>
      </div>
      <div class="col-md-3 col-6 mb-4">
        <div class="stats-box">
          <h3>10+</h3>
          <p>Artisan Partners</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="founder-quote text-center py-5" data-aos="zoom-in">
  <div class="container">
    <p class="fs-4 fst-italic text-muted">"Beauty isn't just about appearance — it's about feeling confident, cared for, and gracefully yourself."</p>
    <footer class="blockquote-footer mt-3">Aarushi Mehta, <cite>Founder of Glow & Grace</cite></footer>
  </div>
</section>

<section class="py-5" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold ">Frequently Asked Questions</h2>
      <p class="text-muted">Find answers to common questions about our products and services.</p>
    </div>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
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

      <div class="accordion-item">
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

      <div class="accordion-item">
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

      <div class="accordion-item">
        <h2 class="accordion-header" id="faqFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
            Can I return or exchange a product?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            We want you to love what you receive. If you're not satisfied, you can request a return or exchange within 7 days of delivery. Please visit our <a href="contact.php" class="text-decoration-underline text-warning">Contact Us</a> page for assistance.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
