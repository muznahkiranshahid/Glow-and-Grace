<?php
// category-manager.php

// Ensure required globals are set
if (!isset($conn)) {
    require_once 'conn.php';
}
if (!isset($catagories) || !isset($imageFolder)) {
    die('<div class="alert alert-danger">Error: $catagories or $imageFolder not set. Define them before including this file.</div>');
}

// ADD category
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $imgName = time() . '_' . basename($_FILES['image']['name']); // unique filename
    $imgPath = $imageFolder . $imgName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $imgPath)) {
        $stmt = $conn->prepare("INSERT INTO $catagories (name, image) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $imgPath);
        $stmt->execute();
    }
}

// UPDATE category
if (isset($_POST['update_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $imgPath = $_POST['old_image'];

    if (!empty($_FILES['image']['name'])) {
        $imgName = time() . '_' . basename($_FILES['image']['name']);
        $imgPath = $imageFolder . $imgName;
        move_uploaded_file($_FILES['image']['tmp_name'], $imgPath);
    }

    $stmt = $conn->prepare("UPDATE $catagories SET name=?, image=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $imgPath, $id);
    $stmt->execute();
}

// DELETE category
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM $catagories WHERE id=$id");
}

// FETCH categories
$categories = $conn->query("SELECT * FROM $catagories");
?>

<!-- Category Manager UI -->
<div class="card p-3 mb-4 shadow-sm">
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4 mb-2">
        <input type="text" name="name" class="form-control" placeholder="Category Name" required>
      </div>
      <div class="col-md-4 mb-2">
        <input type="file" name="image" class="form-control" required>
      </div>
      <div class="col-md-4">
        <button type="submit" name="add_category" class="btn btn-peach w-100">Add Category</button>
      </div>
    </div>
  </form>
</div>

<table class="table table-bordered text-center align-middle shadow-sm bg-white">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($cat = $categories->fetch_assoc()): ?>
      <tr>
        <td><?= $cat['id'] ?></td>
        <td><?= htmlspecialchars($cat['name']) ?></td>
        <td><img src="<?= $cat['image'] ?>" width="60" class="rounded" /></td>
        <td>
          <form method="POST" enctype="multipart/form-data" class="d-inline-flex gap-2 flex-wrap">
            <input type="hidden" name="id" value="<?= $cat['id'] ?>">
            <input type="hidden" name="old_image" value="<?= $cat['image'] ?>">
            <input type="text" name="name" value="<?= htmlspecialchars($cat['name']) ?>" class="form-control w-25" required>
            <input type="file" name="image" class="form-control w-25">
            <button type="submit" name="update_category" class="btn btn-sm btn-primary">Update</button>
          </form>
          <a href="?delete=<?= $cat['id'] ?>" onclick="return confirm('Delete this category?')" class="btn btn-sm btn-danger mt-2 mt-md-0">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
