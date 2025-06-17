<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'makehub');
$users = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background: #fff5f0; font-family: 'Montserrat', sans-serif; }
    .table th { background-color: #ffd8b1; }
    .card-header { background: #ff7c4d; color: white; font-weight: bold; }
  </style>
</head>
<body>
  <div class="container py-4">
    <h2 class="mb-4">Registered Users</h2>
    <div class="card">
      <div class="card-header">Users Table</div>
      <div class="card-body">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $users->fetch_assoc()): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
