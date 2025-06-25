<?php include 'header.php'; ?>
<style>
    :root {
      --bg-light:rgb(239, 217, 252);
      --primary-light: rgb(177, 84, 228);
      --primary: #7A1CAC;
      --text-dark: rgb(17, 17, 17);
      --text-light: #f8f8f8;
      --card-bg:rgb(177, 84, 228);
      --hover-bg: #292929;
      --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
    }
    .text{
        color: var(--pirmary);
    }
</style>
<div class="container my-5">
  <?php
  $query = strtolower(trim($_GET['query'] ?? ''));

  function searchProducts($file, $query) {
    $filePath = __DIR__ . "/json/$file";
    if (!file_exists($filePath)) return [];

    $products = json_decode(file_get_contents($filePath), true);
    $results = [];

    foreach ($products as $product) {
      if (
        stripos($product['name'], $query) !== false ||
        stripos($product['desc'], $query) !== false ||
        stripos($product['category'], $query) !== false
      ) {
        $results[] = $product;
      }
    }
    return $results;
  }

  if ($query !== '') {
    $cosmetics = searchProducts('cosmetics.json', $query);
    $jewelry = searchProducts('jewelry.json', $query);
    $total = count($cosmetics) + count($jewelry);

    echo "<h3 class='mb-4 text-center'>Search Results for <span class='text'>\"$query\"</span> ($total found)</h3>";

    echo "<div class='row g-4'>";
    foreach (array_merge($cosmetics, $jewelry) as $product) {
      echo '<div class="col-md-4 col-lg-3">';
      echo '<div class="card h-100 shadow-sm border-0">';
      echo "<img src='{$product['image1']}' class='card-img-top' style='height: 250px; object-fit: cover;' alt='{$product['name']}'>";
      echo '<div class="card-body">';
      echo "<h5 class='card-title'>{$product['name']}</h5>";
      echo "<p class='card-text text-muted'>Category: {$product['category']}</p>";
      echo "<p class='fw-bold text-dark'>Rs. {$product['price']}</p>";
      echo "<a href='cosmetic-details.php?id={$product['id']}' class='btn btn-outline-dark btn-sm rounded-pill'>View</a>";
      echo '</div></div></div>';
    }
    echo "</div>";

    if ($total === 0) {
      echo "<div class='text-center text-muted mt-5'>No products found matching your search.</div>";
    }

  } else {
    echo "<h4 class='text-center text-muted'>Please enter a search term.</h4>";
  }
  ?>
</div>
