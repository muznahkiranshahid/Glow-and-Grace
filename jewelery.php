<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MakeHub Jewelery</title>


  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./style/style.css" />

  <style>
    :root {
      --peach: #ffe1d6;
      --peach-light: #fff5f0;
      --peach-dark: #ffc2aa;
      --black: #000;
      --text-dark: #1f1f1f;
      --text-highlight: #5c4033;
    }

    body {
      background-color: var(--peach-light);
      color: var(--text-dark);
      font-family: 'Segoe UI', sans-serif;
    }
    
    .card {
      background-color: #fffaf7;
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: hidden;
      position: relative;
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    }

    .image-container {
      position: relative;
      height: 300px;
      background-color: var(--peach);
    }

    .image-container img.primary,
    .image-container img.secondary {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: contain;
      padding: 10px;
      transition: transform 0.4s ease;
    }

    .image-container img.secondary {
      opacity: 0;
      z-index: 2;
      transition: opacity 0.4s ease;
    }

    .card:hover .image-container img.secondary {
      opacity: 1;
    }

    .card:hover .image-container img.primary {
      opacity: 0;
    }

    .overlay-text {
      position: absolute;
      top: 0;
      right: 0;
      background-color: var(--peach-dark);
      padding: 6px 12px;
      font-size: 0.85rem;
      font-weight: bold;
      color: var(--black);
      border-bottom-left-radius: 12px;
      z-index: 3;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      text-transform: uppercase;
    }

    .card-body {
      padding: 1.25rem;
      background-color: #fffdfc;
      text-align: center;
    }

    .card-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 0.4rem;
      text-transform: capitalize;
    }

    .card-text {
      font-size: 1rem;
      color: var(--text-dark);
      margin-bottom: 1rem;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      line-height: 1.4;
      min-height: 2.8rem;
    }

    .card-text strong {
      color: var(--text-highlight);
      font-weight: 600;
    }

    .btn-cart {
      border-radius: 50px;
      padding: 0.5rem 1.5rem;
      font-weight: 600;
      text-transform: uppercase;
      transition: all 0.3s ease;
    }

    .btn-cart:hover {
      background-color: var(--peach-dark);
      color: #fff;
      border-color: var(--text-highlight);
    }

   .btn-cart {
  border-radius: 50px;
  padding: 0.5rem 1.5rem;
  font-weight: 600;
  text-transform: uppercase;
  background-color: var(--peach-dark);
  color: var(--black);
  border: 2px solid var(--peach-dark);
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(255, 124, 77, 0.2);
}

.btn-cart:hover {
  background-color: var(--text-highlight);
  color: #fff;
  border-color: var(--text-highlight);
  box-shadow: 0 6px 16px rgba(92, 64, 51, 0.3);
}


    footer {
      background-color: var(--peach-dark);
      color: var(--black);
      text-align: center;
      padding: 2rem 0;
      border-top: 2px solid var(--black);
      margin-top: 2rem;
    }

    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: var(--black);
      border-radius: 4px;
    }
    .category-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(255, 124, 77, 0.2);
    }
   .category-card {
  min-width: 140px;
  background-color: white;
  border-radius: 20px;
  padding: 8px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
  flex-shrink: 0;
}

.category-card img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 16px;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
}
    .category-card h5 {
      color: var(--text-dark);
    }

  </style>
</head>
<body>
  <!-- Navbar -->
    <!-- header and Icons Bar -->
<?php include 'header.php'; ?>

  <section class="py-4 text-center">
    <div class="container" data-aos="zoom-in">
      <h2 class="mb-3">Shop by Category</h2>
      <div class="d-flex flex-row flex-nowrap overflow-auto gap-3 px-3 justify-content-center">
  <div class="category-card text-center btn" onclick="filterProducts('all')">
    <img src="images/jewels/img3.jpg" alt="All">
    <h5 class="mt-2 text-uppercase">All</h5>
  </div>
  <div class="category-card text-center btn" onclick="filterProducts('Necklace')">
    <img src="images/jewels/img4.jpg" alt="Necklace">
    <h5 class="mt-2 text-uppercase">Necklace</h5>
  </div>
  <div class="category-card text-center btn" onclick="filterProducts('Ring')">
    <img src="images/jewels/img5.jpg" alt="Ring">
    <h5 class="mt-2 text-uppercase">Ring</h5>
  </div>
  <div class="category-card text-center btn" onclick="filterProducts('Earrings')">
    <img src="images/jewels/img6.jpg" alt="Earrings">
    <h5 class="mt-2 text-uppercase">Earrings</h5>
  </div>
  <div class="category-card text-center btn" onclick="filterProducts('Watches')">
    <img src="images/jewels/img7.jpg" alt="Watches">
    <h5 class="mt-2 text-uppercase">Watches</h5>
  </div>
  <div class="category-card text-center btn" onclick="filterProducts('Bracelet')">
    <img src="images/jewels/img8.jpg" alt="Bracelet">
    <h5 class="mt-2 text-uppercase">Bracelet</h5>
  </div>
  <div class="category-card text-center btn" onclick="filterProducts('Brooches')">
    <img src="images/jewels/img9.jpg" alt="Brooches">
    <h5 class="mt-2 text-uppercase">Brooches</h5>
  </div>
</div>

</div>

    </div>
  </section>

  <div class="container py-4">
    <div class="row" id="productGrid"></div>
  </div>

  <footer id="footer"></footer>


<script src="./json/repeat.js"></script>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();

    let productData = [];

    fetch('json/jewelery.json')
      .then(res => {
        if (!res.ok) throw new Error("JSON not found");
        return res.json();
      })
      .then(data => {
        productData = data;
        renderProducts(productData);
      })
      .catch(err => {
        console.error("Error loading JSON:", err);
      });

    const grid = document.getElementById('productGrid');

    function renderProducts(products) {
      grid.innerHTML = '';
      products.forEach((p, index) => {
        grid.innerHTML += `
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="${index * 100}">
            <div class="card">
              <div class="image-container">
                <img src="${p.image1}" alt="${p.name}" class="primary">
                <img src="${p.image2}" alt="${p.name}" class="secondary">
                <div class="overlay-text">${p.brand}</div>
              </div>
              <div class="card-body">
                <h5 class="card-title">${p.name}</h5>
                <p class="card-text"><strong>Brand:</strong> ${p.brand}<br><strong>Price:</strong> ${p.price}</p>
<a href="jewelery-detail.php?id=${p.id}" class="btn btn-cart">
  <i class="fas fa-cart-plus me-1"></i> Add to Cart
</a>
              </div>
            </div>
          </div>
        `;
      });
    }

    function filterProducts(category) {
      const filtered = category === 'all' ? productData : productData.filter(p => p.category === category);
      renderProducts(filtered);
    }
  </script>
</body>
</html>
