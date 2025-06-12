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
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./style/style.css" />

  <style>
    :root {
      --peach: #ffe1d6;
      --peach-light: #fff5f0;
      --peach-dark: #ffcab3;
      --black: #000000;
      --text-dark: #2e2e2e;
      --text-highlight: #5c4033;
    }

    body {
      background-color: var(--peach-light);
      color: var(--text-dark);
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: var(--peach);
      border-bottom: 2px solid var(--black);
    }

    .navbar-brand, .nav-link {
      color: var(--black) !important;
      font-weight: 600;
      text-transform: uppercase;
    }

    .navbar-nav .nav-link:hover {
      color: var(--text-highlight) !important;
    }

    .hero {
      background: linear-gradient(135deg, var(--peach), #fff);
      padding: 80px 20px;
      text-align: center;
      border-bottom: 2px solid var(--black);
    }

    .hero h1 {
      font-size: 3rem;
      color: var(--black);
    }

    .hero p {
      font-size: 1.25rem;
      color: var(--text-highlight);
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
      transform: translateY(-8px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    }

    .card-body {
      padding: 1.5rem;
      background-color: #fffdfc;
      text-align: center;
    }

    .card-title {
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 0.5rem;
    }

    .card-text {
      font-size: 0.95rem;
      color: var(--text-highlight);
      margin-bottom: 1rem;
    }

    .btn-cart {
      border-radius: 50px;
      padding: 0.5rem 1.5rem;
      font-weight: 600;
      text-transform: uppercase;
      transition: all 0.3s ease;
    }

    .btn-cart:hover {
      background-color: var(--text-highlight);
      color: #fff;
      border-color: var(--text-highlight);
    }

    .image-container {
      position: relative;
      height: 250px;
      overflow: hidden;
    }

    .image-container img {
      transition: transform 0.4s ease;
    }

    .card:hover .image-container img {
      transform: scale(1.05);
    }

    .image-container img.primary,
    .image-container img.secondary {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .image-container img.secondary {
      opacity: 0;
      z-index: 2;
      transition: opacity 0.4s ease;
    }

    .image-container:hover img.secondary {
      opacity: 1;
    }

    .image-container:hover img.primary {
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
      color: #fff;
      border-bottom-left-radius: 12px;
      z-index: 3;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-dark {
      border-color: #ffb199;
      color: #7a4e2f;
    }

    .btn-outline-dark:hover,
    .btn-outline-dark.active {
      background-color: #ffb199;
      color: #fff;
      border-color: #ffb199;
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
  </style>
</head>
<body>
  <header id="header"></header>

  <section class="page-header-section">
    <div class="page-header-content text-center py-4" data-aos="fade-down">
      <h1 class="display-4">Cosmetics</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cosmetics</li>
        </ol>
      </nav>
    </div>
  </section>

  <section class="py-4 text-center">
    <div class="container" data-aos="zoom-in">
      <h2 class="mb-3">Shop by Category</h2>
      <div class="btn-group" role="group">
        <button class="btn btn-outline-dark" onclick="filterProducts('all')">All</button>
        <button class="btn btn-outline-dark" onclick="filterProducts('Lipstick')">Lipstick</button>
        <button class="btn btn-outline-dark" onclick="filterProducts('Foundation')">Foundation</button>
        <button class="btn btn-outline-dark" onclick="filterProducts('Face Powder')">Face Powder</button>
        <button class="btn btn-outline-dark" onclick="filterProducts('Eyeliner')">Eyeliner</button>
        <button class="btn btn-outline-dark" onclick="filterProducts('Mascara')">Mascara</button>
        <button class="btn btn-outline-dark" onclick="filterProducts('Highlighter')">Highlighter</button>
      </div>
    </div>
  </section>

  <div class="container py-4">
    <div class="row" id="productGrid"></div>
  </div>

  <footer id="footer"></footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();

    let productData = [];

    fetch('json/cosmetics.json')
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
                <div class="overlay-text">${p.category}<br><small>${p.name}</small></div>
              </div>
              <div class="card-body">
                <h5 class="card-title">${p.name}</h5>
                <p class="card-text"><strong>Brand:</strong> ${p.brand}<br><strong>Price:</strong> ${p.price}</p>
                <a href="cosmetic-details.php?id=${p.id}" class="btn btn-cart btn-outline-dark">Add to Cart</a>
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
