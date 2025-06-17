<?php
session_start();

// Get product ID from query string
if (!isset($_GET['id'])) {
  echo "<h2 style='text-align:center;'>No product selected.</h2>";
  exit;
}

$productId = intval($_GET['id']);
$product = null;

// Load and decode the cosmetics JSON file
$jsonData = file_get_contents('json/cosmetics.json');
$products = json_decode($jsonData, true);

// Search for product by ID
foreach ($products as $p) {
  if ($p['id'] == $productId) {
    $product = $p;
    break;
  }
}

if (!$product) {
  echo "<h2 style='text-align:center;'>Product not found.</h2>";
  exit;
}
?>
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
            <li class="nav-item">
              <a href="cart.php" class="btn btn-outline-dark">🛒</a>
            </li>
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
          <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product['name']); ?></li>
        </ol>
      </nav>
    </div>
  </section>

  <div class="container-fluid py-5">
    <div class="product-detail">
      <div class="flex-gallery mb-4">
        <div style="background-image: url('<?php echo htmlspecialchars($product['image1']); ?>');"></div>
        <div style="background-image: url('<?php echo htmlspecialchars($product['image2']); ?>');"></div>
      </div>
      <h2><?php echo htmlspecialchars($product['name']); ?></h2>
      <p><strong>Brand:</strong> <?php echo htmlspecialchars($product['brand']); ?></p>
      <p><strong>Price:</strong> <?php echo htmlspecialchars($product['price']); ?></p>
<p><?php echo htmlspecialchars($product['description'] ?? 'No description available.'); ?></p>

      <?php if (isset($_SESSION['user_id'])): ?>
        <form action="add-to-cart.php" method="post" onsubmit="return validateQuantity()">
          <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
          <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['price']); ?>">
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
          </div>
          <button type="submit" class="btn btn-outline-dark">Add to Cart</button>
        </form>
      <?php else: ?>
        <button class="btn btn-outline-dark" onclick="promptLogin()">Add to Cart</button>
      <?php endif; ?>
    </div>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> MakeHub Cosmetics. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();

    function promptLogin() {
      alert("Please login to add items to your cart.");
    }

    function validateQuantity() {
      const qty = document.getElementById('quantity').value;
      return qty > 0;
    }
  </script>
</body>
</html>
