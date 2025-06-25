<?php 
// index.php (or any main file)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MakeHub Cosmetics</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./style/style.css" />

  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: rgb(177, 84, 228);
      --bg-light: rgb(233, 203, 250);
      --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
      --text-dark: #1f1f1f;
    }

    body {
      background-color: var(--bg-light);
      font-family: 'Montserrat', sans-serif;
      color: var(--text-dark);
    }
.hero {
  background: linear-gradient(135deg, var(--primary-light), var(--bg-light));
  padding: 80px 20px;
  text-align: center;
  border-bottom: 2px solid var(--primary);
}

.hero h1 {
  font-size: 3rem;
  color: var(--primary);
}

.hero p {
  font-size: 1.25rem;
  color: #4c296b;
}

    .card {
      background-color: white;
      border: none;
      border-radius: 16px;
      box-shadow: var(--shadow);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .image-container {
      position: relative;
      height: 280px;
    }

    .image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: all 0.4s ease;
    }

    .image-container img.secondary {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
    }

    .card:hover .secondary {
      opacity: 1;
    }

    .card:hover .primary {
      opacity: 0;
    }

    .view-text {
      position: absolute;
      bottom: 0;
      width: 100%;
      background-color: rgba(122, 28, 172, 0.85);
      color: white;
      text-align: center;
      padding: 8px 0;
      font-weight: 600;
      font-size: 1rem;
      opacity: 0;
      transition: 0.3s ease;
    }

    .card:hover .view-text {
      opacity: 1;
    }

    .overlay-text {
      position: absolute;
      top: 0;
      right: 0;
      background-color: var(--primary);
      color: white;
      padding: 6px 12px;
      border-bottom-left-radius: 10px;
      font-size: 0.85rem;
      font-weight: 600;
    }

    .card-body {
      text-align: center;
      background-color: white;
      padding: 0.75rem;
    }

    .card-title {
      font-size: 1rem;
      font-weight: 600;
      color: var(--primary);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .category-card {
      background-color: white;
      border-radius: 16px;
      padding: 10px;
      transition: 0.3s;
      text-align: center;
      cursor: pointer;
    }

    .category-card:hover {
      box-shadow: var(--shadow);
      transform: translateY(-5px);
    }

    .category-card img {
      width: 100px;
      height: 100px;
      border-radius: 12px;
      object-fit: cover;
      margin-bottom: 10px;
    }

    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: var(--primary);
      border-radius: 4px;
    }
  </style>
</head>
<body>
<script>
  const isLoggedIn = <?= $isLoggedIn ? 'true' : 'false' ?>;
</script>

<?php include 'header.php'; ?>


<section class="hero">
  <div class="container">
    <h1>Explore Our Beauty Collection</h1>
    <p>Discover lipsticks, foundations, eyeliners and more</p>
  </div>
</section>

<section class="py-4 text-center">
  <div class="container" data-aos="zoom-in">
    <h2 class="mb-4" style="color: var(--primary)">Shop by Category</h2>
    <div class="d-flex flex-row flex-nowrap overflow-auto gap-3 px-3">
      <!-- Static Categories -->
      <div class="category-card btn" onclick="filterProducts('all')">
        <img src="images/cosmetics/img3.jpg" alt="All">
        <h5 class="text-uppercase">All</h5>
      </div>
      
      <?php
        include 'conn.php';
        $cat_query = $conn->query("SELECT * FROM cosmetic_categories");
        while ($cat = $cat_query->fetch_assoc()) {
      ?>
      <div class="category-card btn" onclick="filterProducts('<?= $cat['name'] ?>')">
        <img src="<?= $cat['image'] ?>" alt="<?= $cat['name'] ?>">
        <h5 class="text-uppercase"><?= $cat['name'] ?></h5>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<div class="container py-4">
  <div class="row" id="productGrid"></div>
</div>

  <!-- Footer -->
   <?php include 'footer.php'; ?>


<script src="./json/repeat.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();

  let productData = [];

  fetch('json/cosmetics.json')
    .then(res => res.json())
    .then(data => {
      productData = data;
      renderProducts(productData);
    })
    .catch(err => console.error("Error loading JSON:", err));

  function filterProducts(category) {
    const filtered = category === 'all' ? productData : productData.filter(p => p.category === category);
    renderProducts(filtered);
  }

function renderProducts(products) {
  const grid = document.getElementById('productGrid');
  grid.innerHTML = '';
  products.forEach((p, index) => {
    grid.innerHTML += `
      <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="${index * 100}">
        <div class="card">
          <a href="cosmetic-details.php?id=${p.id}" class="text-decoration-none text-dark">
            <div class="image-container">
              <img src="${p.image1}" class="primary" alt="${p.name}">
              <img src="${p.image2}" class="secondary" alt="${p.name}">
              <div class="overlay-text">${p.brand}</div>
              <div class="view-text">View Details</div>
            </div>
          </a>
          <div class="card-body">
            <h5 class="card-title">${p.name}</h5>
          </div>
        </div>
      </div>`;
  });
}

</script>
</body>
</html>
