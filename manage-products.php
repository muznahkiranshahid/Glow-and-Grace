<?php session_start(); ?>
<?php
$category = $_GET['category'] ?? 'cosmetics';
$jsonPath = $category === 'jewelery' ? './json/jewelery.json' : './json/cosmetics.json';
$data = json_decode(file_get_contents($jsonPath), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage <?= ucfirst($category) ?> Products</title>
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

    .admin-header {
      background: linear-gradient(135deg, var(--peach-base), #fff);
      padding: 30px;
      border-radius: 12px;
      margin-bottom: 20px;
    }

    .table thead {
      background-color: var(--peach-dark);
      color: white;
    }

    .btn-edit, .btn-delete {
      border-radius: 30px;
      padding: 5px 12px;
      font-size: 0.9rem;
    }

    .btn-edit {
      background: var(--peach-dark);
      color: black;
    }

    .btn-delete {
      background: #dc3545;
      color: white;
    }

    footer {
      background-color: var(--peach-base);
      text-align: center;
      padding: 10px;
      margin-top: 40px;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column">
  <h4 class="text-center mb-4">Admin Panel</h4>
  <a href="admin-dashboard.php?category=cosmetics">Cosmetics Dashboard</a>
  <a href="admin-dashboard.php?category=jewelery">Jewelry Dashboard</a>
  <a href="manage-products.php?category=cosmetics">Manage Cosmetics</a>
  <a href="manage-products.php?category=jewelery">Manage Jewelry</a>
  <a href="#">Manage Categories</a>
  <a href="#">Manage Users</a>
  <a href="#">Orders</a>
  <a href="#">Reports</a>
  <a href="#">Backup</a>
  <a href="#">Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
  <div class="admin-header">
    <h1>Manage <?= ucfirst($category) ?> Products</h1>
  </div>

  <div class="text-end mb-3">
    <a href="add-product.php?category=<?= $category ?>" class="btn btn-sm" style="background-color: var(--peach-dark); color: white;">
      <i class="fas fa-plus-circle me-1"></i> Add New Product
    </a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered align-middle text-center">
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>
          <th>Name</th>
          <th>Brand</th>
          <th>Category</th>
          <th>Price</th>
          <th>Actions</th>
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
            <a href="edit-product.php?category=<?= $category ?>&id=<?= $item['id'] ?>" class="btn btn-edit"><i class="fas fa-edit"></i></a>
            <a href="delete-product.php?category=<?= $category ?>&id=<?= $item['id'] ?>" class="btn btn-delete" onclick="return confirm('Delete this product?')"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<footer>
  <p>&copy; 2025 MakeHub Admin Panel</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
