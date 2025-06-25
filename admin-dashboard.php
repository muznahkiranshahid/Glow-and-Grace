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
  $result1 = $conn->query("
    SELECT product_name, SUM(quantity) AS total_sold 
    FROM purchases 
    GROUP BY product_name 
    ORDER BY total_sold DESC 
    LIMIT 10
  ");
  if ($result1 && $result1->num_rows > 0) {
      while ($row = $result1->fetch_assoc()) {
          $topSellers[] = $row;
      }
  }
}

if ($view === 'top-customers') {
  $result2 = $conn->query("
    SELECT username, SUM(total) AS total_spent 
    FROM purchases 
    GROUP BY username 
    ORDER BY total_spent DESC 
    LIMIT 10
  ");
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    .brand {
      font-family: 'Great Vibes', cursive!important;
      font-size: 2.5rem;
      color: black;
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
    .dropdown-toggle {
  color: var(--text-dark);
  font-weight: 500;
}
.dropdown-menu {
  background-color: var(--peach-base);
}
.dropdown-menu a:hover {
  background-color: var(--peach-dark);
  color: white;
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

<!-- Sidebar -->
<div class="sidebar d-flex flex-column">
  <h4 class="text-center mb-4 brand">Glow and Grace</h4>
  <h4 class="text-center mb-4">Admin Panel</h4>
  <a href="admin-dashboard.php?category=cosmetics">Cosmetics Dashboard</a>
<a href="admin-dashboard.php?category=jewelery">Jewelry Dashboard</a>

<!-- Manage Categories Dropdown -->
<div class="dropdown px-3">
  <a class="dropdown-toggle d-block py-2" data-bs-toggle="dropdown" href="#">Manage Categories</a>
  <ul class="dropdown-menu shadow">
    <li><a class="dropdown-item" href="admin-jewelry-categories.php">Jewelry Categories</a></li>
    <li><a class="dropdown-item" href="admin-cosmetic-categories.php">Cosmetics Categories</a></li>
  </ul>
</div>

  <a href="admin-users.php">Manage Users</a>
  <a href="admin-purchases.php">Orders</a>
  <a href="admin-dashboard.php?view=top-sellers">Top Sellers</a>
  <a href="admin-dashboard.php?view=top-customers">Top Customers</a>
  <a href="logout.php">Logout</a>
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
      backgroundColor: "<?= $view === 'top-sellers' ? '#ff7c4d' : '#ffd8b1' ?>"
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
</body>
</html>
