<?php
// add-product.php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $category = $_POST['category'] ?? 'cosmetics';
  $name = $_POST['name'];
  $brand = $_POST['brand'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  $filePath = $category === 'jewelery' ? './json/jewelery.json' : './json/cosmetics.json';
  $imageDir = $category === 'jewelery' ? 'images/jewelery/' : 'images/cosmetics/';

  $data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

  $id = count($data) > 0 ? end($data)['id'] + 1 : 1;

  $img1Name = basename($_FILES['image1']['name']);
  $img2Name = basename($_FILES['image2']['name']);

  move_uploaded_file($_FILES['image1']['tmp_name'], $imageDir . $img1Name);
  move_uploaded_file($_FILES['image2']['tmp_name'], $imageDir . $img2Name);

  $newProduct = [
    'id' => $id,
    'name' => $name,
    'brand' => $brand,
    'category' => $category,
    'price' => $price,
    'description' => $description,
    'image1' => $imageDir . $img1Name,
    'image2' => $imageDir . $img2Name
  ];

  $data[] = $newProduct;

  file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

  header("Location: admin-dashboard.php?category=$category");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Product - MakeHub Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root {
      --peach-light: #fff5f0;
      --peach-base: #ffd8b1;
      --peach-dark: #ff7c4d;
      --text-dark: #2e2e2e;
    }
    body {
      background: var(--peach-light);
      font-family: 'Segoe UI', sans-serif;
      padding: 2rem;
      color: var(--text-dark);
    }
    h2 {
      color: var(--peach-dark);
    }
    .btn-peach {
      background-color: var(--peach-dark);
      border: none;
      color: #fff;
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      font-weight: bold;
      text-transform: uppercase;
    }
    .btn-peach:hover {
      background-color: #e8663f;
    }
    .form-label {
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="mb-4">Add New Product</h2>
    <form action="" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-white shadow">
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select name="category" class="form-select" required>
          <option value="cosmetics">Cosmetics</option>
          <option value="jewelery">Jewelery</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Brand</label>
        <input type="text" name="brand" class="form-control" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" name="price" class="form-control" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Primary Image</label>
        <input type="file" name="image1" class="form-control" accept="image/*" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Secondary Image</label>
        <input type="file" name="image2" class="form-control" accept="image/*" required />
      </div>
      <button type="submit" class="btn btn-peach">Add Product</button>
    </form>
  </div>
</body>
</html>
