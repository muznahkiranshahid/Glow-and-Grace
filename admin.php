<?php
// admin-dashboard.php
session_start();
// Add login check logic here if needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - Glow & Grace</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
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
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .card-header {
      background-color: var(--peach-dark);
      color: white;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <a href="#">Dashboard</a>
    <a href="#">Manage Products</a>
    <a href="#">Manage Categories</a>
    <a href="#">Manage Users</a>
    <a href="#">Orders</a>
    <a href="#">Reports</a>
    <a href="#">Backup</a>
    <a href="#">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <h2 class="mb-4">Welcome to Glow & Grace Admin Dashboard</h2>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Products</div>
          <div class="card-body">
            <p>Total: <strong>120</strong></p>
            <a href="#" class="btn btn-outline-dark">Manage</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Orders</div>
          <div class="card-body">
            <p>Today: <strong>15</strong></p>
            <a href="#" class="btn btn-outline-dark">View Orders</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Clients</div>
          <div class="card-body">
            <p>Registered: <strong>85</strong></p>
            <a href="#" class="btn btn-outline-dark">View Clients</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
