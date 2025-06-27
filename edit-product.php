<?php 
session_start();

$category = $_GET['category'] ?? 'jewelery';
$id = $_GET['id'] ?? null;

if (!$id) die("Product ID is missing.");

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
if (!$product) die("Product not found.");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data[$productIndex]['name'] = $_POST['name'];
  $data[$productIndex]['brand'] = $_POST['brand'];
  $data[$productIndex]['category'] = $_POST['category'];
  $data[$productIndex]['price'] = $_POST['price'];
  $data[$productIndex]['desc'] = $_POST['description'];

  $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

  if (!empty($_FILES['image1']['name'])) {
    $image1Type = mime_content_type($_FILES['image1']['tmp_name']);
    if (!in_array($image1Type, $allowedTypes)) {
      echo "<script>alert('❌ Invalid format for Image 1. Only JPG, PNG, GIF, WEBP allowed.'); window.history.back();</script>";
      exit;
    }
    $imgName1 = time() . '_1_' . basename($_FILES['image1']['name']);
    $target1 = 'img/products/' . $imgName1;
    move_uploaded_file($_FILES['image1']['tmp_name'], $target1);
    $data[$productIndex]['image1'] = $target1;
  }

  if (!empty($_FILES['image2']['name'])) {
    $image2Type = mime_content_type($_FILES['image2']['tmp_name']);
    if (!in_array($image2Type, $allowedTypes)) {
      echo "<script>alert('❌ Invalid format for Image 2. Only JPG, PNG, GIF, WEBP allowed.'); window.history.back();</script>";
      exit;
    }
    $imgName2 = time() . '_2_' . basename($_FILES['image2']['name']);
    $target2 = 'img/products/' . $imgName2;
    move_uploaded_file($_FILES['image2']['tmp_name'], $target2);
    $data[$productIndex]['image2'] = $target2;
  }

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
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: rgb(177, 84, 228);
      --bg-dark: #0e0e0e;
      --text-light: #fff;
    }

    body {
      margin: 0;
      background-color: var(--bg-dark);
      color: var(--text-light);
      font-family: 'Montserrat', sans-serif;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 240px;
      height: 100vh;
      background-color: var(--primary);
      padding-top: 20px;
      z-index: 1000;
    }

    .sidebar a {
      color: #fff;
      display: block;
      padding: 12px 20px;
      font-size: 16px;
      text-decoration: none;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: var(--primary-light);
    }

    .sidebar a i {
      margin-right: 10px;
    }

    .main-content {
      margin-left: 240px;
      padding: 2rem;
    }

    .form-container {
      background-color: #fff;
      color: #000;
      border-radius: 12px;
      padding: 2rem;
      max-width: 800px;
      margin: 0 auto;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: var(--primary);
      font-weight: bold;
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
  background-color:var(--primary-light);
  z-index: -1;
  transition: 0.3s;
  transform: scaleX(0);
  transform-origin: left;
  border-radius: 4px;
}

.glow-btn:hover {
      color: var(--text-light);
}

.glow-btn:hover::after {
  transform: scaleX(1);
}
    img.preview {
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-top: 5px;
      width: 100px;
      height: auto;
    }

    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
        transition: 0.3s;
      }
      .sidebar.active {
        transform: translateX(0);
      }
      .main-content {
        margin-left: 0;
        padding: 1rem;
      }
      .sidebar-toggle {
        display: block;
        position: fixed;
        top: 15px;
        left: 15px;
        background: var(--primary);
        color: white;
        padding: 8px 10px;
        border: none;
        z-index: 1100;
      }
    }

    .sidebar-toggle {
      display: none;
    }
  </style>
</head>
<body>

<!-- Sidebar Toggle -->
<button class="sidebar-toggle" onclick="document.querySelector('.sidebar').classList.toggle('active')">
  <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<div class="sidebar">
  <div class="text-center text-white fs-4 fw-bold mb-3">Glow & Grace</div>
  <div class="text-center text-white mb-3">Admin Panel</div>
  <a href="admin-dashboard.php?category=cosmetics"><i class="fas fa-palette"></i> Cosmetics Dashboard</a>
  <a href="admin-dashboard.php?category=jewelery"><i class="fas fa-gem"></i> Jewelry Dashboard</a>
  <a href="admin-users.php"><i class="fas fa-users"></i> Manage Users</a>
  <a href="admin-purchases.php"><i class="fas fa-shopping-cart"></i> Orders</a>
  <a href="admin-dashboard.php?view=top-sellers"><i class="fas fa-star"></i> Top Sellers</a>
  <a href="admin-dashboard.php?view=top-customers"><i class="fas fa-user-tie"></i> Top Customers</a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
  <h2 class="mb-4">Edit Product - <?= ucfirst($category) ?></h2>
  <div class="form-container">
    <form method="POST" enctype="multipart/form-data" id="editForm">
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
        <textarea name="description" class="form-control" rows="3" required><?= htmlspecialchars($product['desc']) ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Current Image 1</label><br>
        <img src="<?= $product['image1'] ?>" class="preview">
      </div>
      <div class="mb-3">
        <label class="form-label">Change Image 1</label>
        <input type="file" name="image1" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp">
      </div>

      <div class="mb-3">
        <label class="form-label">Current Image 2</label><br>
        <img src="<?= $product['image2'] ?>" class="preview">
      </div>
      <div class="mb-3">
        <label class="form-label">Change Image 2</label>
        <input type="file" name="image2" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp">
      </div>

      <div class="text-end">
        <button type="submit" class="btn glow-btn btn-submit">Update Product</button>
        <a href="admin-dashboard.php?category=<?= $category ?>" class="btn btn-secondary ms-2">Cancel</a>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('editForm').addEventListener('submit', function (e) {
  const validTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];
  const image1 = document.querySelector('input[name="image1"]').files[0];
  const image2 = document.querySelector('input[name="image2"]').files[0];

  if (image1 && !validTypes.includes(image1.type)) {
    e.preventDefault();
    alert("❌ Image 1 must be JPG, PNG, GIF, or WEBP.");
    return;
  }

  if (image2 && !validTypes.includes(image2.type)) {
    e.preventDefault();
    alert("❌ Image 2 must be JPG, PNG, GIF, or WEBP.");
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
