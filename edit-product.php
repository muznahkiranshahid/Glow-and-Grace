<?php 
session_start();

$category = $_GET['category'] ?? 'jewelery';
$id = $_GET['id'] ?? null;

if (!$id) {
  die("Product ID is missing.");
}

$filePath = $category === 'cosmetics' ? './json/cosmetics.json' : './json/jewelery.json';
$data = json_decode(file_get_contents($filePath), true);

// Find product
$product = null;
foreach ($data as $index => $item) {
  if ($item['id'] == $id) {
    $product = $item;
    $productIndex = $index;
    break;
  }
}

if (!$product) {
  die("Product not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data[$productIndex]['name'] = $_POST['name'];
  $data[$productIndex]['brand'] = $_POST['brand'];
  $data[$productIndex]['category'] = $_POST['category'];
  $data[$productIndex]['price'] = $_POST['price'];
  $data[$productIndex]['description'] = $_POST['description'];

  // Handle image1 upload
  if (!empty($_FILES['image1']['name'])) {
    $imgName1 = time() . '_1_' . $_FILES['image1']['name'];
    $target1 = 'img/products/' . $imgName1;
    move_uploaded_file($_FILES['image1']['tmp_name'], $target1);
    $data[$productIndex]['image1'] = $target1;
  }

  // Handle image2 upload
  if (!empty($_FILES['image2']['name'])) {
    $imgName2 = time() . '_2_' . $_FILES['image2']['name'];
    $target2 = 'img/products/' . $imgName2;
    move_uploaded_file($_FILES['image2']['tmp_name'], $target2);
    $data[$productIndex]['image2'] = $target2;
  }

  // Save to file
  file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
  header("Location: admin-dashboard.php?category=$category");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Product - <?= ucfirst($category) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <style>
    :root {
      --peach-light: #fff5f0;
      --peach-base: #ffd8b1;
      --peach-dark: #ff7c4d;
      --text-dark: #2e2e2e;
    }
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--peach-light);
      color: var(--text-dark);
    }
    .container {
      max-width: 700px;
      margin-top: 40px;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    .btn-peach {
      background-color: var(--peach-dark);
      color: white;
    }
    img.preview {
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-top: 5px;
      width: 100px;
      height: auto;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="mb-4">Edit Product - <?= ucfirst($category) ?></h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Product Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Brand</label>
      <input type="text" name="brand" value="<?= htmlspecialchars($product['brand']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Category</label>
      <input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="text" name="price" value="<?= htmlspecialchars($product['price']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="3" required><?= htmlspecialchars($product['description']) ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Current Image 1</label><br>
      <img src="<?= $product['image1'] ?>" class="preview">
    </div>
    <div class="mb-3">
      <label class="form-label">Change Image 1</label>
      <input type="file" name="image1" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Current Image 2</label><br>
      <img src="<?= $product['image2'] ?>" class="preview">
    </div>
    <div class="mb-3">
      <label class="form-label">Change Image 2</label>
      <input type="file" name="image2" class="form-control">
    </div>

    <button type="submit" class="btn btn-peach">Update Product</button>
    <a href="admin-dashboard.php?category=<?= $category ?>" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</div>

</body>
</html>
