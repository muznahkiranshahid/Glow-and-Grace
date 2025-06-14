<?php
// manage-products.php
session_start();
// include 'db.php'; // Your database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Products - Glow & Grace</title>
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
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <a href="admin-dashboard.php">Dashboard</a>
    <a href="manage-products.php">Manage Products</a>
    <a href="#">Manage Categories</a>
    <a href="#">Manage Users</a>
    <a href="#">Orders</a>
    <a href="#">Reports</a>
    <a href="#">Backup</a>
    <a href="#">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <h2 class="mb-4">Manage Products</h2>

    <!-- Add Product Form -->
    <div class="card mb-5">
      <div class="card-header">Add New Product</div>
      <div class="card-body">
        <form action="add-product.php" method="POST" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Product Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Brand</label>
              <input type="text" name="brand" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Category</label>
              <select name="category_id" class="form-select" required>
                <option value="">Select</option>
                <option value="1">Cosmetics</option>
                <option value="2">Jewelry</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Price</label>
              <input type="number" step="0.01" name="price" class="form-control" required>
            </div>
            <div class="col-md-12">
              <label class="form-label">Description</label>
              <textarea name="description" rows="3" class="form-control" required></textarea>
            </div>
            <div class="col-md-12">
              <label class="form-label">Product Image</label>
              <input type="file" name="image" class="form-control" required>
            </div>
          </div>
          <button type="submit" class="btn mt-3" style="background-color: var(--peach-dark); color: white;">Add Product</button>
        </form>
      </div>
    </div>

    <!-- Product List Table -->
    <div class="card">
      <div class="card-header">All Products</div>
      <div class="card-body">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Brand</th>
              <th>Category</th>
              <th>Price</th>
              <th style="width: 160px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample row (replace with dynamic PHP loop) -->
            <tr>
              <td>1</td>
              <td><img src="../img/sample.jpg" width="50"></td>
              <td>Glow Lipstick</td>
              <td>L'Oréal</td>
              <td>Cosmetics</td>
              <td>$25.00</td>
              <td>
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            <!-- Loop ends -->
          </tbody>
        </table>
      </div>
    </div>

  </div>

</body>
</html>
