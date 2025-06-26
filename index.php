<?php  
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'conn.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Glow & Grace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      :root {
        --primary: #7A1CAC;
        --primary-light: #B154E4;
        --bg-light: #F5E8FA;
        --text-dark: #111;
        --text-light: #f8f8f8;
        --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
      }
      body {
        font-family: 'Montserrat', sans-serif;
        background: var(--bg-light);
        color: var(--text-dark);
        scroll-behavior: smooth;
        overflow-x: hidden;
        margin: 0;
        padding: 0;
      }
      .container {
        padding-left: 15px;
        padding-right: 15px;
      }
      .brand {
        font-family: 'Great Vibes';
        font-size: 60px;
        color: var(--primary);
      }
      .glow-btn {
        background: var(--primary);
        color: white;
        padding: 8px 10px;
        border: none;
        border-radius: 50px;
        font-weight: bold;
        transition: 0.3s;
        width: auto;
        display: inline-block;
        white-space: nowrap;
      }
      .glow-btn:hover {
        background: #631696;
        box-shadow: 0 0 10px var(--primary-light);
      }
      .top-card img,
      .collection-preview img,
      .insta-grid img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 12px;
      }
      .hover-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        height: 350px;
        margin-bottom: 20px;
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
        font-size: 2.2rem;
        color: var(--primary-light);
      }
      .hover-text p {
        font-size: 1rem;
      }
      .category-scroll {
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 1rem;
      }
      .category-scroll::-webkit-scrollbar {
        display: none;
      }
      .category-item {
        display: inline-block;
        margin-right: 15px;
      }
      .category-item img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 12px;
      }
      .top-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: white;
        box-shadow: var(--shadow);
      }
      .top-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
      }
      .top-card .card-body {
        padding: 10px;
        text-align: center;
      }
      .top-card .card-title {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--primary);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      @media (max-width: 767px) {
        .brand {
          font-size: 45px;
        }
        .hover-text h4 {
          font-size: 1.5rem;
        }
        .hover-text p {
          font-size: 0.95rem;
        }
        .carousel-caption {
          padding: 1rem;
          text-align: center !important;
          align-items: center !important;
        }
      }
    </style>
  </head>
<body>
<?php include 'header.php'; ?>
<section class="container hero-slider position-relative overflow-hidden" style="height: 90vh;">
  <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner h-100">
      <div class="carousel-item active h-100">
        <img src="images/hero1.png" class="d-block w-100 h-100 object-fit-cover" alt="Slide 1">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-start h-100 p-5">
          <h1 class="display-4 fw-bold" style="font-family: 'Great Vibes'; color: var(--primary-light);">Welcome to Glow & Grace</h1>
          <p class="lead text-light">Luxury Cosmetics & Jewelry, Curated for You</p>
          <a href="#categories" class="btn glow-btn mt-3 px-4 py-2">Shop Now</a>
        </div>
      </div>
      <div class="carousel-item h-100">
        <img src="images/hero2.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Slide 2">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-start h-100 p-5">
          <h1 class="display-4 fw-bold" style="font-family: 'Great Vibes'; color: var(--primary-light);">Elegant Beauty Essentials</h1>
          <p class="lead text-light"> </p>
          <a href="#products" class="btn glow-btn mt-3 px-4 py-2">Explore More</a>
        </div>
      </div>
      <div class="carousel-item h-100">
        <img src="images/hero3.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Slide 3">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-start h-100 p-5">
          <h1 class="display-4 fw-bold" style="font-family: 'Great Vibes'; color: var(--primary-light);">Glow With Grace</h1>
          <p class="lead text-light">Where style meets sophistication</p>
          <a href="#top-selling" class="btn glow-btn mt-3 px-4 py-2">Top Sellers</a>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="products">
  <div class="container mt-5">
    <h1 class="brand text-center" data-aos="fade-up">Our Products</h1>
    <div class="row">
      <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
        <a href="cosmetic-product.php">
          <div class="hover-image-container">
            <img src="./images/cosmetics/img3.jpg" alt="Cosmetics Image">
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
            <img src="./images/jewels/img1.jpg" alt="Jewelry Image">
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

<!-- Cosmetics Categories Scroll Section -->
<section class="py-4 text-center" style="background-color: #fff;">
  <div class="container" data-aos="zoom-in">
    <h2 class="mb-4" style="color: var(--primary); font-family: 'Great Vibes'; font-size: 60px;">Cosmetic Categories</h2>
    <div class="category-scroll d-flex gap-4 px-3">
      <?php
        $cosmeticCatQuery = $conn->query("SELECT * FROM cosmetic_categories");
        while ($cat = $cosmeticCatQuery->fetch_assoc()) {
      ?>
        <a href="cosmetic-product.php?category=<?= urlencode($cat['name']) ?>" class="text-decoration-none text-center category-item">
          <img src="<?= $cat['image'] ?>" alt="<?= $cat['name'] ?>">
          <h5 class="text-uppercase mt-2" style="color: #7A1CAC;"><?= $cat['name'] ?></h5>
        </a>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Jewelry Categories Scroll Section -->
<section class="py-4 text-center" style="background-color: #f9f3ff;">
  <div class="container" data-aos="zoom-in">
    <h2 class="mb-4" style="color: var(--primary); font-family: 'Great Vibes'; font-size: 60px;">Jewelry Categories</h2>
    <div class="category-scroll d-flex gap-4 px-3">
      <?php
        $jewelryCatQuery = $conn->query("SELECT * FROM categories");
        while ($cat = $jewelryCatQuery->fetch_assoc()) {
      ?>
        <a href="jewelery.php?category=<?= urlencode($cat['name']) ?>" class="text-decoration-none text-center category-item">
          <img src="<?= $cat['image'] ?>" alt="<?= $cat['name'] ?>">
          <h5 class="text-uppercase mt-2" style="color: #7A1CAC;"><?= $cat['name'] ?></h5>
        </a>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Top Selling Section -->
<section class="py-5 text-center">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-4" style="color: var(--primary); font-family: 'Great Vibes'; font-size: 60px;">Top 10 Best Sellers</h2>
    <div class="row justify-content-center">
      <?php
      $topProducts = [];
      $topRaw = $conn->query("SELECT product_name, SUM(quantity) AS total_sold FROM purchases GROUP BY product_name ORDER BY total_sold DESC LIMIT 10");
      if ($topRaw && $topRaw->num_rows > 0) {
        $cosmetics = json_decode(file_get_contents("json/cosmetics.json"), true);
        $jewelry = json_decode(file_get_contents("json/jewelery.json"), true);
        while ($row = $topRaw->fetch_assoc()) {
          $found = false;
          foreach ($cosmetics as $item) {
            if ($item['name'] === $row['product_name']) {
              $item['type'] = 'cosmetic';
              $topProducts[] = $item;
              $found = true;
              break;
            }
          }
          if (!$found) {
            foreach ($jewelry as $item) {
              if ($item['name'] === $row['product_name']) {
                $item['type'] = 'jewelery';
                $topProducts[] = $item;
                break;
              }
            }
          }
        }
      }
      foreach ($topProducts as $p) {
        $link = $p['type'] === 'cosmetic' ? 'cosmetic-details.php' : 'jewelery-detail.php';
      ?>
      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
        <a href="<?= $link ?>?id=<?= $p['id'] ?>" class="text-decoration-none">
          <div class="top-card">
            <img src="<?= $p['image1'] ?>" alt="<?= $p['name'] ?>">
            <div class="card-body">
              <h6 class="card-title"><?= $p['name'] ?></h6>
            </div>
          </div>
        </a>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- New Instagram-Style Grid Section -->
<section class="py-5 text-center" style="background-color: #fff9ff;">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-4" style="font-family: 'Great Vibes'; color: var(--primary); font-size: 60px;">#GlowWithGrace</h2>
    <div class="row g-3 insta-grid">
      <div class="col-6 col-md-3">
        <img src="images/jewels/p5.jpg" alt="Glam Look">
      </div>
      <div class="col-6 col-md-3">
        <img src="images/jewels/p6.jpg" alt="Makeup Style">
      </div>
      <div class="col-6 col-md-3">
        <img src="images/jewels/p7.jpg" alt="Jewelry Pick">
      </div>
      <div class="col-6 col-md-3">
        <img src="images/jewels/p8.jpg" alt="Beauty Vibes">
      </div>
    </div>
  </div>
</section>


<section id="contact-short m-4 pt-3" class="py-5" style="background-color: #f9f3ff;">
  <div class="container">
    <h2 class="text-center mb-4" style="font-family: 'Great Vibes'; color: #7A1CAC; font-size: 60px;">Get in Touch</h2>
    <form method="POST" action="contact-handler.php" class="row g-3">
      <div class="col-md-6">
        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
      </div>
      <div class="col-md-6">
        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
      </div>
      <div class="col-12">
        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
      </div>
      <div class="col-12">
        <textarea name="message" class="form-control" rows="4" placeholder="Message" required></textarea>
      </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn glow-btn p-2">Send Message</button>
      </div>
    </form>
  </div>
</section>

<!-- New Collection Preview Section -->
<section class="collection-preview m-5" data-aos="fade-up">
  <div class="container">
    <h2>Featured Collections</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card">
          <img src="images/img4.jpg" alt="Elegant Sets">
          <div class="card-body text-center">
            <h5 class="card-title">Elegant Sets</h5>
            <p class="card-text">Perfectly paired jewelry & cosmetics sets to complete your look.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="images/jewels/p1.jpg" alt="Luxury Picks">
          <div class="card-body text-center">
            <h5 class="card-title">Luxury Picks</h5>
            <p class="card-text">Indulge in our premium curated items for every special moment.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="images/jewels/p4.jpg" alt="Everyday Glam">
          <div class="card-body text-center">
            <h5 class="card-title">Everyday Glam</h5>
            <p class="card-text">Simple, affordable, and stunning pieces made for daily wear.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why cho0se us -->
<section class="p-5 mt-5" style="background: #2e2e2e;">
  <div class="container text-center text-light">
    <h2 class="mb-4" style="color: #B154E4;">Why Choose Glow & Grace?</h2>
    <div class="row">
      <div class="col-md-4" data-aos="zoom-in">
        <i class="fa-solid fa-star fa-2x mb-3" style="color: #B154E4;"></i>
        <h5>Top Quality</h5>
        <p>Premium products that speak for themselves.</p>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <i class="fa-solid fa-truck-fast fa-2x mb-3" style="color: #B154E4;"></i>
        <h5>Fast Delivery</h5>
        <p>Lightning-fast shipping across Pakistan.</p>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <i class="fa-solid fa-headset fa-2x mb-3" style="color: #B154E4;"></i>
        <h5>Support</h5>
        <p>We’re always here to help, 24/7.</p>
      </div>
    </div>
  </div>
</section>

<!-- About Glow & Grace Section -->
<section class="about-section m-5 p-5" data-aos="fade-up">
  <div class="container text-center">
    <h2 class="brand">About Glow & Grace</h2>
    <p>Glow & Grace is your one-stop destination for luxurious cosmetics and elegant jewelry. Our collections are curated to highlight your inner beauty and make every moment sparkle. Shop with confidence and experience the grace you deserve.</p>
  </div>
</section>


<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({ once: true });</script>
</body>
</html>

