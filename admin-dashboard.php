<?php session_start(); ?>
<?php
require_once 'conn.php';

$category = $_GET['category'] ?? 'jewelery';
$view = $_GET['view'] ?? 'dashboard';
$filePath = $category === 'cosmetics' ? './json/cosmetics.json' : './json/jewelery.json';
$data = json_decode(file_get_contents($filePath), true);

$topSellers = [];
$topUsers = [];

if ($view === 'top-sellers') {
  $result1 = $conn->query("SELECT product_name, SUM(quantity) AS total_sold FROM purchases GROUP BY product_name ORDER BY total_sold DESC LIMIT 10");
  if ($result1 && $result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
      foreach ($data as $item) {
        if (trim(strtolower($item['name'])) === trim(strtolower($row['product_name']))) {
          $row['image1'] = $item['image1'];
          $topSellers[] = $row;
          break;
        }
      }
    }
  }
}

if ($view === 'top-customers') {
  $result2 = $conn->query("SELECT username, SUM(total) AS total_spent FROM purchases GROUP BY username ORDER BY total_spent DESC LIMIT 10");
  if ($result2 && $result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
      $topUsers[] = $row;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - <?= ucfirst($category) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: rgb(177, 84, 228);
      --bg-dark: #0e0e0e;
      --text-light: #fff;
      --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
    }
    body {
      margin: 0;
      background-color: var(--bg-dark);
      color: var(--text-light);
      font-family: 'Montserrat', sans-serif;
    }
    .brand {
      font-family: 'Great Vibes', cursive;
      font-size: 2.2rem;
      color: #fff;
      text-align: center;
    }
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 240px;
      height: 100vh;
      background-color: var(--primary);
      box-shadow: var(--shadow);
      padding-top: 20px;
      z-index: 1000;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      font-size: 16px;
      transition: background 0.3s;
    }
    .sidebar a:hover {
      background-color: var(--primary-light);
    }
    .sidebar a i {
      margin-right: 10px;
    }
    .dropdown-toggle {
      width: 100%;
      text-align: left;
    }
    .dropdown-menu {
      background-color: var(--primary-light);
    }
    .dropdown-menu a {
      color: #fff;
    }
    .dropdown-menu a:hover {
      background-color: #fff;
      color: var(--primary);
    }
    .main-content {
      margin-left: 240px;
      padding: 2rem;
    }
    .card {
      background-color: #fff;
      color: #000;
      border-radius: 12px;
      box-shadow: var(--shadow);
    }
    .card-header {
      background-color: var(--primary);
      color: white;
      font-weight: 600;
    }
    table {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
    }
    th {
      background-color: var(--primary-light);
      color: #fff;
    }
    .btn-edit {
      background-color: var(--primary);
      color: white;
    }
    .btn-delete {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="brand mb-3">Glow & Grace</div>
  <div class="text-center text-white mb-3">Admin Panel</div>
  <a href="admin-dashboard.php?category=cosmetics"><i class="fas fa-palette"></i> Cosmetics Dashboard</a>
  <a href="admin-dashboard.php?category=jewelery"><i class="fas fa-gem"></i> Jewelry Dashboard</a>
  <div class="dropdown px-3">
    <a class="dropdown-toggle text-white py-2" data-bs-toggle="dropdown" href="#"><i class="fas fa-list"></i> Manage Categories</a>
    <ul class="dropdown-menu shadow">
      <li><a class="dropdown-item" href="admin-jewelry-categories.php">Jewelry Categories</a></li>
      <li><a class="dropdown-item" href="admin-cosmetic-categories.php">Cosmetics Categories</a></li>
    </ul>
  </div>
  <a href="admin-users.php"><i class="fas fa-users"></i> Manage Users</a>
  <a href="admin-purchases.php"><i class="fas fa-shopping-cart"></i> Orders</a>
  <a href="admin-dashboard.php?view=top-sellers"><i class="fas fa-star"></i> Top Sellers</a>
  <a href="admin-dashboard.php?view=top-customers"><i class="fas fa-user-tie"></i> Top Customers</a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
  <?php if ($view === 'top-sellers'): ?>
    <h2 class="mb-4">Top 10 Best-Selling Products</h2>
    <div class="card mb-5">
      <div class="card-body">
        <canvas id="topSellersChart"></canvas>
      </div>
    </div>
  <?php elseif ($view === 'top-customers'): ?>
    <h2 class="mb-4">Top 10 Customers by Spend</h2>
    <div class="card mb-5">
      <div class="card-body">
        <canvas id="topUsersChart"></canvas>
      </div>
    </div>
  <?php else: ?>
    <h2 class="mb-4 text-white"><?= ucfirst($category) ?> Products Overview</h2>
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span>Product List</span>
        <a href="add-product.php?category=<?= $category ?>" class="btn btn-sm btn-light">
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
  <?php endif; ?>
</div>

<?php if ($view === 'top-sellers' || $view === 'top-customers'): ?>
<script>
const ctx = document.getElementById("<?= $view === 'top-sellers' ? 'topSellersChart' : 'topUsersChart' ?>").getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($view === 'top-sellers' ? array_column($topSellers, 'product_name') : array_column($topUsers, 'username')) ?>,
    datasets: [{
      label: "<?= $view === 'top-sellers' ? 'Units Sold' : 'Total Spent (Rs.)' ?>",
      data: <?= json_encode($view === 'top-sellers' ? array_column($topSellers, 'total_sold') : array_column($topUsers, 'total_spent')) ?>,
      backgroundColor: "<?= $view === 'top-sellers' ? '#7A1CAC' : 'rgb(177, 84, 228)' ?>"
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
