<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $category = $_POST['category'] ?? 'cosmetics';
  $name = $_POST['name'];
  $brand = $_POST['brand'];
  $price = $_POST['price'];
  $description = $_POST['desc'];

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
    'desc' => $description,
    'image1' => $imageDir . $img1Name,
    'image2' => $imageDir . $img2Name
  ];

  $data[] = $newProduct;
  file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

  header("Location: admin-dashboard.php?category=$category");
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

$image1Type = mime_content_type($_FILES['image1']['tmp_name']);
$image2Type = mime_content_type($_FILES['image2']['tmp_name']);

if (!in_array($image1Type, $allowedTypes) || !in_array($image2Type, $allowedTypes)) {
    echo "<script>
        alert('❌ Only image files are allowed (JPG, PNG, GIF, WEBP)');
        window.history.back();
    </script>";
    exit;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Product - Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    /* Responsive Sidebar */
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
  <h2 class="mb-4">Add New Product</h2>
  <div class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Category</label>
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
      <div class="text-end">
        <button type="submit" class="btn glow-btn btn-submit">Add Product</button>
      </div>
    </form>
  </div>
</div>
<script>
document.querySelector("form").addEventListener("submit", function (e) {
  const image1 = document.querySelector('input[name="image1"]').files[0];
  const image2 = document.querySelector('input[name="image2"]').files[0];
  const validTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];

  if (!image1 || !image2) return; // Required already handles empty

  if (!validTypes.includes(image1.type) || !validTypes.includes(image2.type)) {
    e.preventDefault();
    alert("❌ Please upload valid image files (JPG, PNG, GIF, WEBP only)");
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
