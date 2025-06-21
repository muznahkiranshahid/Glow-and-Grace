<?php
session_start();
include 'conn.php';

// ADD
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];

    // Upload image
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

    // New image?
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
  <title>Manage Categories</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background: #fff5f0; font-family: 'Segoe UI', sans-serif; }
    .card { border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); }
    .form-control, .btn { border-radius: 8px; }
    .btn-peach { background-color: #ffc2aa; color: #000; }
    .btn-peach:hover { background-color: #ffb095; }
    .table img { width: 60px; border-radius: 12px; }
  </style>
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">Manage Categories</h2>

    <!-- Add Form -->
    <div class="card p-4 mb-5">
      <h5>Add New Category</h5>
      <form method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4 mb-3">
            <input type="text" name="name" class="form-control" placeholder="Category Name" required />
          </div>
          <div class="col-md-4 mb-3">
            <input type="file" name="image" class="form-control" required />
          </div>
          <div class="col-md-4">
            <button type="submit" name="add_category" class="btn btn-peach w-100">Add Category</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Table -->
    <table class="table table-bordered align-middle text-center">
      <thead class="table-dark">
        <tr><th>#</th><th>Name</th><th>Image</th><th>Actions</th></tr>
      </thead>
      <tbody>
        <?php while($cat = $categories->fetch_assoc()): ?>
          <tr>
            <td><?= $cat['id'] ?></td>
            <td><?= htmlspecialchars($cat['name']) ?></td>
            <td><img src="<?= $cat['image'] ?>" width="60"></td>
            <td>
              <form method="POST" enctype="multipart/form-data" class="d-inline">
                <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                <input type="hidden" name="old_image" value="<?= $cat['image'] ?>">
                <input type="text" name="name" value="<?= $cat['name'] ?>" class="form-control d-inline w-25" required />
                <input type="file" name="image" class="form-control d-inline w-25" />
                <button type="submit" name="update_category" class="btn btn-sm btn-primary">Update</button>
              </form>
              <a href="?delete=<?= $cat['id'] ?>" onclick="return confirm('Delete this category?')" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
