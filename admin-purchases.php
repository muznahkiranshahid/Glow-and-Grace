<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'makehub');
$purchases = $conn->query("SELECT * FROM purchases ORDER BY purchase_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Panel - Orders</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
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

    .brand {
      font-family: 'Great Vibes', cursive;
      font-size: 2rem;
      text-align: center;
      color: white;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 240px;
      height: 100vh;
      background-color: var(--primary);
      padding-top: 20px;
      transition: all 0.3s ease;
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

    .sidebar .dropdown-toggle {
      width: 100%;
      text-align: left;
    }

    .dropdown-menu {
      background-color: var(--primary-light);
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
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: var(--primary);
      color: white;
      font-weight: 600;
    }

    .table th {
      background-color: var(--primary-light);
      color: white;
    }

    /* Responsive Sidebar */
    .sidebar-toggle {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      background: var(--primary);
      color: white;
      padding: 8px 10px;
      border: none;
      z-index: 1100;
    }

    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
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
      }
    }
  </style>
</head>
<body>

<!-- Sidebar Toggle Button -->
<button class="sidebar-toggle" onclick="document.querySelector('.sidebar').classList.toggle('active')">
  <i class="fas fa-bars"></i>
</button>

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
  <h2 class="mb-4">Customer Orders</h2>
  <div class="card">
    <div class="card-header">Orders Table</div>
    <div class="card-body table-responsive">
      <table class="table table-bordered text-center align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $purchases->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['username'] ?></td>
              <td><?= $row['product_name'] ?></td>
              <td><?= $row['product_price'] ?></td>
              <td><?= $row['quantity'] ?></td>
              <td><?= $row['total'] ?></td>
              <td><?= $row['purchase_date'] ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
