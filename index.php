<?php
// index.php (or any main file)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?><!doctype html>
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
        --primary: #7A1CAC;
        --primary-light: rgb(177, 84, 228);
        --bg-light: rgb(233, 203, 250);
        --text-dark: rgb(17, 17, 17);
        --text-light: #f8f8f8;
        --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
      }

      body {
        font-family: 'Montserrat', sans-serif;
        background: var(--bg-light);
        color: var(--text-dark);
        scroll-behavior: smooth;
      }
      .brand {
      font-family: 'Great Vibes';
      font-size: 300px;
      color: black;
    }
      .hero-section {
        background: var(--primary-light);
        padding: 100px 20px;
        color: var(--text-light);
      }

      .hero-content h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
      }

      .hero-content p {
        font-size: 1.1rem;
        color: #eee;
      }

      .countdown div small {
        color: #ddd;
      }

      .cta-btn {
        background: var(--primary);
        color: white;
        padding: 15px 25px;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: bold;
        text-decoration: none;
      }

      .cta-btn:hover {
        background: #631696;
      }

      .hover-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        height: 350px;
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

      .hover-text h4.cosmetics-font {
        font-family: 'Great Vibes', cursive;
      }

      .hover-text h4.jewelry-font {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
      }

      .card {
        background-color: #fdf6ff;
        border: none;
        border-radius: 16px;
        box-shadow: var(--shadow);
        transition: transform 0.3s ease;
      }

      .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      }

      .testimonials-section {
        background: rgba(177, 84, 228, 0.1);
        padding: 80px 0;
      }

      .testimonial-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: var(--shadow);
      }

      .testimonial-text {
        font-style: italic;
      }

      .author-info p {
        color: var(--primary);
      }

      ::-webkit-scrollbar {
        width: 8px;
      }
      ::-webkit-scrollbar-thumb {
        background-color: var(--primary);
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
    <!-- Breadcrumb and Icons Bar -->
<?php include 'header.php'; ?>
    

    <!-- Hover Products -->
    <section id="products">
      <div class="container mt-5">
        <h1 class="brand" data-aos="fade-up">Our Products</h1>
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
   <?php include 'footer.php'; ?>


    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS  -->
     <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
     <script>
       AOS.init({
         once: false // Ensures animations trigger every time you scroll back
       });
     </script>
      </body>
</html>