<?php include 'conn.php'; ?>

<!-- Footer with Parallax Background -->
<div class="parallax-footer position-relative text pt-5 pb-4">
  <div class="parallax-overlay position-absolute top-0 start-0 w-100 h-100" ></div>

  <div class="container position-relative" style="z-index: 2;">
    <div class="row gy-4">

      <!-- Brand Info -->
      <div class="col-lg-4 col-md-6">
        <h4 class="fw-bolder fs-1 mb-3 brand" >Glow & Grace</h4>
        <p class="text">Glow & Grace celebrates timeless beauty and elegance with our handpicked cosmetics and artisan jewelry. Crafted for confidence, curated with care.</p>
        <div class="d-flex gap-3 mt-3">
          <a href="#" class="text fs-5"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text fs-5"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text fs-5"><i class="fab fa-twitter"></i></a>
        </div>
      </div>

      <!-- Makeup -->
      <div class="col-lg-2 col-md-6">
        <h5 class="fw-bolder fs-3 mb-3 text">Makeup</h5>
        <ul class="list-unstyled">
          <?php
          $makeupSQL = $conn->query("SELECT name FROM cosmetic_categories");
          while ($row = $makeupSQL->fetch_assoc()) {
              echo '<li><a href="cosmetic-product.php?category=' . urlencode($row['name']) . '" class="text text-decoration-none d-block py-1">' . htmlspecialchars($row['name']) . '</a></li>';
          }
          ?>
        </ul>
      </div>

      <!-- Jewelry -->
      <div class="col-lg-2 col-md-6">
        <h5 class="fw-bolder fs-3 mb-3 text">Jewelry</h5>
        <ul class="list-unstyled">
          <?php
          $jewelrySQL = $conn->query("SELECT name FROM categories");
          while ($row = $jewelrySQL->fetch_assoc()) {
              echo '<li><a href="jewelery.php?category=' . urlencode($row['name']) . '" class="text text-decoration-none d-block py-1">' . htmlspecialchars($row['name']) . '</a></li>';
          }
          ?>
        </ul>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-4 col-md-6">
        <h5 class="fw-bolder fs-3 mb-3 text">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text text-decoration-none d-block py-1">Home</a></li>
          <li><a href="about.php" class="text text-decoration-none d-block py-1">About Us</a></li>
          <li><a href="cosmetic-product.php" class="text text-decoration-none d-block py-1">Cosmetics</a></li>
          <li><a href="jewelery.php" class="text text-decoration-none d-block py-1">Jewelry</a></li>
          <li><a href="contact.php" class="text text-decoration-none d-block py-1">Contact</a></li>
        </ul>
      </div>

    </div>

    <div class="text-center mt-4 pt-3 border-top border-secondary-subtle">
      <p class="mb-0 small text">&copy;<?= date("Y") ?> Glow & Grace. All rights reserved.</p>
    </div>
  </div>
</div>

<!-- Parallax Footer Background Style -->
<style>
  .parallax-footer {
    background-image: url('images/img3.jpg'); /* 👈 Change to your desired image */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    position: relative;
    overflow: hidden;

  }
.parallax-overlay {
  backdrop-filter: blur(5px);
  background:	rgba(227, 190, 248, 0.5); /* 👈 Adjust transparency here */
  z-index: 1;
}
    .brand {
      font-family: 'Great Vibes', cursive;
      font-size: 2.5rem;
      color: black;
    }
    .text{
      color: black;
    }

  @media (max-width: 767.98px) {
    .parallax-footer {
      background-attachment: scroll; /* fallback for mobile */
    }
  }
</style>
