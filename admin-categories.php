<?php
session_start();
include 'conn.php';

// ADD
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $imageName = $_FILES['image']['name'];
    $imagePath = 'images/' . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    $stmt = $conn->prepare("INSERT INTO categories (name, image) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $imagePath);
    $stmt->execute();
}

// UPDATE
if (isset($_POST['update_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $imagePath = $_POST['old_image'];
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $imagePath = 'images/' . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }
    $stmt = $conn->prepare("UPDATE categories SET name=?, image=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $imagePath, $id);
    $stmt->execute();
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM categories WHERE id=$id");
}

$categories = $conn->query("SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Panel - Manage Categories</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
  <h2 class="mb-4">Manage Categories</h2>

  <!-- Add Form -->
  <div class="card p-4 mb-4">
    <h5>Add New Category</h5>
    <form method="POST" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-md-4">
          <input type="text" name="name" class="form-control" placeholder="Category Name" required />
        </div>
        <div class="col-md-4">
          <input type="file" name="image" class="form-control" required />
        </div>
        <div class="col-md-4">
          <button type="submit" name="add_category" class="btn btn-success w-100"><i class="fas fa-plus me-1"></i> Add Category</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Category Table -->
  <div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
      <thead>
        <tr><th>#</th><th>Name</th><th>Image</th><th>Actions</th></tr>
      </thead>
      <tbody>
        <?php while($cat = $categories->fetch_assoc()): ?>
          <tr>
            <td><?= $cat['id'] ?></td>
            <td><?= htmlspecialchars($cat['name']) ?></td>
            <td><img src="<?= $cat['image'] ?>" alt="Category"></td>
            <td>
              <form method="POST" enctype="multipart/form-data" class="d-inline d-md-flex gap-2 align-items-center">
                <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                <input type="hidden" name="old_image" value="<?= $cat['image'] ?>">
                <input type="text" name="name" value="<?= $cat['name'] ?>" class="form-control form-control-sm" required />
                <input type="file" name="image" class="form-control form-control-sm" />
                <button type="submit" name="update_category" class="btn btn-sm btn-primary">Update</button>
              </form>
              <a href="?delete=<?= $cat['id'] ?>" onclick="return confirm('Delete this category?')" class="btn btn-sm btn-danger mt-2 mt-md-0">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
