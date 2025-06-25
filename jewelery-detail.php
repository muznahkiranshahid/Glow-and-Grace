<?php session_start(); ?>   
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

    .product-detail {
      background-color: white;
      border-radius: 16px;
      box-shadow: var(--shadow);
      padding: 2rem;
      border: 2px solid var(--primary);
    }

    .product-detail h2 {
      color: var(--primary);
    }

    .glow-btn {
      width: 150px;
      height: 40px;
      border: none;
      cursor: pointer;
      background-color: transparent;
      position: relative;
      outline: 2px solid var(--primary);
      border-radius: 4px;
      color: var(--primary);
      font-size: 16px;
      transition: 0.3s;
      z-index: 1;
      overflow: hidden;
    }

    .glow-btn::after {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: var(--primary-light);
      z-index: -1;
      transition: 0.3s;
      transform: scaleX(0);
      transform-origin: left;
      border-radius: 4px;
    }

    .glow-btn:hover {
      color: white;
    }

    .glow-btn:hover::after {
      transform: scaleX(1);
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
      background-size: cover;
      transition: all 0.8s cubic-bezier(0.25, 0.4, 0.45, 1.4);
      cursor: pointer;
    }

    .flex-gallery > div:hover {
      flex: 4;
    }

    .quantity-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 10px;
    }

    .quantity-wrapper button {
      width: 32px;
      height: 32px;
      border: none;
      background-color: var(--primary-light);
      color: white;
      font-size: 1.2rem;
      border-radius: 4px;
      font-weight: bold;
    }

    .quantity-wrapper input[type="number"] {
      width: 60px;
      text-align: center;
      border: 1px solid var(--primary);
      border-radius: 4px;
    }

    @media (max-width: 768px) {
      .flex-gallery {
        flex-direction: column;
        height: auto;
      }

      .flex-gallery > div {
        height: 200px;
      }

      .flex-gallery > div:hover {
        flex: 1.5;
      }
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>

<section class="hero">
  <div class="container">
    <h1>Explore Our Beauty Collection</h1>
    <p>Discover lipsticks, foundations, eyeliners and more</p>
  </div>
</section>

<div class="container py-5">
  <?php
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $jsonData = file_get_contents('json/jewelery.json');
    $products = json_decode($jsonData, true);
    $found = false;

    foreach ($products as $p) {
      if ($p['id'] == $id) {
        $found = true;
        echo '
        <div class="row product-detail" data-aos="fade-up">
          <div class="col-md-6 mb-4">
            <div class="flex-gallery">
              <div class="border" style="background-image: url('.$p['image1'].');"></div>
              <div class="border" style="background-image: url('.$p['image2'].');"></div>
            </div>
          </div>
          <div class="col-md-6">
            <h2>'.$p['name'].'</h2>
            <p><strong>Brand:</strong> '.$p['brand'].'</p>
            <p><strong>Category:</strong> '.$p['category'].'</p>
            <p><strong>Price:</strong> Rs. '.(int)$p['price'].'</p>
            <p><strong>Description:</strong> '.$p['desc'].'</p>
            <form action="add-to-cart.php" method="post">
              <input type="hidden" name="product_name" value="'.$p['name'].'">
              <input type="hidden" name="product_price" value="'.$p['price'].'">
              <input type="hidden" name="product_desc" value="'.$p['desc'].'">
              <input type="hidden" name="product_image" value="images/jewels/'.$p['image1'].'">
              <label for="quantity"><strong>Quantity:</strong></label>
              <div class="quantity-wrapper">
                <button type="button" onclick="changeQty(-1)">-</button>
                <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                <button type="button" onclick="changeQty(1)">+</button>
              </div>
              <button type="submit" class="btn glow-btn mt-3">Add to Cart</button>
            </form>
          </div>
        </div>';
      }
    }

    if (!$found) {
      echo '<div class="alert alert-warning text-center">Product not found.</div>';
    }
  ?>
</div>

<?php include 'footer.php'; ?>

<script src="./json/repeat.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();

  function changeQty(change) {
    const qtyInput = document.getElementById("quantity");
    let value = parseInt(qtyInput.value);
    value = isNaN(value) ? 1 : value + change;
    if (value < 1) value = 1;
    qtyInput.value = value;
  }
</script>
</body>
</html>
