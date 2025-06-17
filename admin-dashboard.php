<?php session_start(); ?>
<?php
$category = $_GET['category'] ?? 'jewelery';
$filePath = $category === 'cosmetics' ? './json/cosmetics.json' : './json/jewelery.json';
$data = json_decode(file_get_contents($filePath), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - <?= ucfirst($category) ?></title>
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
    .sidebar {
      background-color: var(--peach-base);
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      padding-top: 2rem;
    }
    .sidebar a {
      color: var(--text-dark);
      text-decoration: none;
      display: block;
      padding: 15px 20px;
      font-weight: 500;
    }
    .sidebar a:hover {
      background-color: var(--peach-dark);
      color: white;
    }
    .main-content {
      margin-left: 250px;
      padding: 2rem;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    .card-header {
      background-color: var(--peach-dark);
      color: white;
      font-weight: 600;
    }
    table {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
    }
    th {
      background-color: var(--peach-base);
    }
    .btn-edit {
      background-color: var(--peach-dark);
      color: white;
    }
    .btn-delete {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>
<!-- Navbar -->
    <header id="header"></header>
    <!-- Breadcrumb and Icons Bar -->
<?php include 'breadcrumb.php'; ?>
<!-- Sidebar -->
<div class="sidebar d-flex flex-column">
  <h4 class="text-center mb-4">Admin Panel</h4>
  <a href="admin-dashboard.php?category=cosmetics">Cosmetics Dashboard</a>
  <a href="admin-dashboard.php?category=jewelery">Jewelry Dashboard</a>
  <a href="#">Manage Categories</a>
  <a href="admin-users.php">Manage Users</a>
  <a href="admin-purchases.php">Orders</a>
  <a href="#">Reports</a>
  <a href="#">Backup</a>
  <a href="#">Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
  <h2 class="mb-4"><?= ucfirst($category) ?> Products Overview</h2>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>Product List</span>
      <a href="add-product.php?category=<?= $category ?>" class="btn btn-sm" style="background-color: var(--peach-dark); color: white;">
        <i class="fas fa-plus me-1"></i> Add Product
      </a>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover text-center align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Price</th>
            <th style="width: 160px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $item): ?>
            <tr>
              <td><?= $item['id'] ?></td>
              <td><img src="<?= $item['image1'] ?>" width="60" /></td>
              <td><?= $item['name'] ?></td>
              <td><?= $item['brand'] ?></td>
              <td><?= $item['category'] ?></td>
              <td><?= $item['price'] ?></td>
              <td>
                <a href="edit-product.php?category=<?= $category ?>&id=<?= $item['id'] ?>" class="btn btn-sm btn-edit"><i class="fas fa-edit"></i></a>
                <a href="delete-product.php?category=<?= $category ?>&id=<?= $item['id'] ?>" class="btn btn-sm btn-delete" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
          <?php if (empty($data)): ?>
            <tr><td colspan="7">No products found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<script src="./json/repeat.js"></script>

</body>
</html>
