<?php
session_start();
include 'conn.php';

$catagories = "categories";
$imageFolder = "images/jewels/";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Jewelry Categories</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body { background-color: #fff5f0; font-family: 'Segoe UI', sans-serif; }
    .btn-peach { background-color: #ffc2aa; color: #000; }
    .btn-peach:hover { background-color: #ffb190; color: #000; }
    .table img { border-radius: 10px; }
  </style>
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">Jewelry Category Manager</h2>
    <?php include 'category-manager.php'; ?>
  </div>
</body>
</html>
