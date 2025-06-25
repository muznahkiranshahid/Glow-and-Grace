<?php
session_start();
include 'conn.php';

$catagories = "categories";
$imageFolder = "images/jewels/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Panel - Manage Jewelry Categories</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: rgb(177, 84, 228);
      --bg-dark: #0e0e0e;
      --text-light: #fff;
    }

    body {
      background-color: var(--bg-dark);
      color: var(--text-light);
      font-family: 'Montserrat', sans-serif;
      margin: 0;
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

    .form-control, .btn {
      border-radius: 8px;
    }

    .table img {
      width: 60px;
      border-radius: 10px;
    }

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
  <h2 class="mb-4">Jewelry Category Manager</h2>
  <?php include 'category-manager.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
