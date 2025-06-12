<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cosmetic Details - MakeHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="./style/style.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>

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
      font-family: 'Segoe UI', sans-serif;
      color: var(--text-dark);
    }

    .navbar {
      background-color: var(--peach);
      border-bottom: 2px solid var(--black);
    }

    .navbar-brand, .nav-link {
      color: var(--black) !important;
      font-weight: 600;
    }

    .product-detail {
      background-color: #fffaf7;
      border-radius: 16px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
      padding: 2rem;
      border: 2px solid var(--black);
    }

    .product-detail h2 {
      color: var(--black);
    }

    .btn-outline-dark {
      border-color: #ffb199;
      color: #7a4e2f;
    }

    .btn-outline-dark:hover {
      background-color: #ffb199;
      color: #fff;
    }

    .flex-gallery {
      display: flex;
      height: 20rem;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .flex-gallery > div {
      flex: 1;
      border-radius: 12px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: auto 100%;
      transition: all 0.8s cubic-bezier(0.25, 0.4, 0.45, 1.4);
      cursor: pointer;
    }

    .flex-gallery > div:hover {
      flex: 4;
    }

    footer {
      background-color: var(--peach-dark);
      text-align: center;
      padding: 2rem;
      border-top: 2px solid var(--black);
    }

    .breadcrumb-item a {
      text-decoration: none;
      color: var(--text-highlight);
    }

    .breadcrumb-item.active {
      color: var(--black);
    }

    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: var(--black);
      border-radius: 4px;
    }

    @media (max-width: 768px) {
      .flex-gallery {
        flex-direction: column;
        height: auto;
      }

      .flex-gallery > div {
        height: 200px;
        background-size: cover;
      }

      .flex-gallery > div:hover {
        flex: 1.5;
      }
    }
  </style>
</head>
<body>
  <header id="header">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">MakeHub</a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="cosmetics.php">Cosmetics</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="page-header-section text-center py-4">
    <div class="container">
      <h1 class="display-4">Product Detail</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="cosmetics.php">Cosmetics</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
      </nav>
    </div>
  </section>

  <div class="container py-5">
    <?php
      $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
      $jsonData = file_get_contents('json/cosmetics.json');
      $products = json_decode($jsonData, true);
      $found = false;

      foreach ($products as $p) {
        if ($p['id'] == $id) {
          $found = true;
          echo '
          <div class="row product-detail" data-aos="fade-up">
            <div class="col-md-6 mb-4">
              <div class="flex-gallery">
                <div style="background-image: url(\''.$p['image1'].'\');"></div>
                <div style="background-image: url(\''.$p['image2'].'\');"></div>
              </div>
            </div>
            <div class="col-md-6">
              <h2>'.$p['name'].'</h2>
              <p><strong>Brand:</strong> '.$p['brand'].'</p>
              <p><strong>Category:</strong> '.$p['category'].'</p>
              <p><strong>Price:</strong> ₹'.$p['price'].'</p>
              <a href="#" class="btn btn-outline-dark">Add to Cart</a>
            </div>
          </div>';
        }
      }

      if (!$found) {
        echo '<div class="alert alert-warning text-center">Product not found.</div>';
      }
    ?>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> MakeHub Cosmetics. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>
