<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'makehub');
$purchases = $conn->query("SELECT * FROM purchases ORDER BY purchase_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background: #fff5f0; font-family: 'Montserrat', sans-serif; }
    .table th { background-color: #ffd8b1; }
    .card-header { background: #ff7c4d; color: white; font-weight: bold; }
  </style>
</head>
<body>
  <div class="container py-4">
    <h2 class="mb-4">Customer Orders</h2>
    <div class="card">
      <div class="card-header">Orders Table</div>
      <div class="card-body">
        <table class="table table-bordered text-center">
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
</body>
</html>

