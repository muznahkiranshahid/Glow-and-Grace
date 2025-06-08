<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MakeHub Cosmetics</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./style/style.css" />
</head>
<body>
  <!-- Navbar -->
  <header id="header"></header>

  <!-- Page Header Section -->
  <section class="page-header-section">
    <div class="page-header-content animate">
      <h1 class="display-4">Cosmetics</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cosmetics</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Main Content -->
  <div class="container-fluid py-5">
    <div class="row">
      <div class="col-md-3">
        <div class="sidebar">
          <h5>Categories</h5>
          <button onclick="filterProducts('all')">All</button>
          <button onclick="filterProducts('Lipstick')">Lipstick</button>
          <button onclick="filterProducts('Foundation')">Foundation</button>
          <button onclick="filterProducts('Face Powder')">Face Powder</button>
          <button onclick="filterProducts('Eyeliner')">Eyeliner</button>
          <button onclick="filterProducts('Mascara')">Mascara</button>
          <button onclick="filterProducts('Blush')">Blush</button>
          <button onclick="filterProducts('Highlighter')">Highlighter</button>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row gy-4" id="productGrid"></div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer id="footer"></footer>

  <!-- Scripts -->
  <script>
    const productData = [
      { id: 1, name: 'Velvet Matte Lipstick', brand: 'Luxe Beauty', category: 'Lipstick', price: 'Rs. 799', image1: 'images/lipstick1a.jpg', image2: 'images/lipstick1b.jpg' },
      { id: 2, name: 'Perfect Match Foundation', brand: 'GlowUp', category: 'Foundation', price: 'Rs. 1199', image1: 'images/foundation1a.jpg', image2: 'images/foundation1b.jpg' },
      { id: 3, name: 'Soft Touch Face Powder', brand: 'Elegance', category: 'Face Powder', price: 'Rs. 650', image1: 'images/facepowder1a.jpg', image2: 'images/facepowder1b.jpg' },
      { id: 4, name: 'Jet Black Eyeliner', brand: 'EyeArt', category: 'Eyeliner', price: 'Rs. 450', image1: 'images/eyeliner1a.jpg', image2: 'images/eyeliner1b.jpg' },
      { id: 5, name: 'Mega Lash Mascara', brand: 'LashQueen', category: 'Mascara', price: 'Rs. 799', image1: 'images/mascara1a.jpg', image2: 'images/mascara1b.jpg' },
      { id: 6, name: 'Rosy Blush', brand: 'BlushBloom', category: 'Blush', price: 'Rs. 599', image1: 'images/blush1a.jpg', image2: 'images/blush1b.jpg' },
      { id: 7, name: 'Shimmer Glow Highlighter', brand: 'Radiance', category: 'Highlighter', price: 'Rs. 899', image1: 'images/highlighter1a.jpg', image2: 'images/highlighter1b.jpg' }
    ];

    const grid = document.getElementById('productGrid');

    function renderProducts(products) {
      grid.innerHTML = '';
      products.forEach(p => {
        grid.innerHTML += `
          <div class="col-md-4 animate">
            <div class="card">
              <img src="${p.image1}" class="card-img-top primary" alt="${p.name}" height="250">
              <img src="${p.image2}" class="card-img-top secondary" alt="${p.name}" height="250">
              <div class="card-body">
                <h5 class="card-title">${p.name}</h5>
                <p class="card-text"><strong>Brand:</strong> ${p.brand}<br><strong>Price:</strong> ${p.price}</p>
                <a href="cosmetic-details.php?id=${p.id}" class="btn btn-cart">Add to Cart</a>
              </div>
            </div>
          </div>
        `;
      });
      document.querySelectorAll('.animate').forEach(el => {
        setTimeout(() => el.classList.add('visible'), 100);
      });
    }

    function filterProducts(category) {
      if (category === 'all') {
        renderProducts(productData);
      } else {
        const filtered = productData.filter(p => p.category === category);
        renderProducts(filtered);
      }
    }

    renderProducts(productData);
  </script>

  <script>
    const animatedElements = document.querySelectorAll('.animate');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.1 });
    animatedElements.forEach(el => observer.observe(el));
  </script>
  <script src="json/repeat.js"></script>
</body>
</html>
