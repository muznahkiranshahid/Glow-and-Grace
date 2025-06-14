<?php
// delete-product.php
session_start();
include '../includes/db.php';

if (isset($_GET['id'])) {
  $id = (int)$_GET['id'];

  // Optional: fetch image and delete file
  $getImg = mysqli_query($conn, "SELECT image FROM products WHERE id=$id");
  if ($getImg && mysqli_num_rows($getImg)) {
    $img = mysqli_fetch_assoc($getImg)['image'];
    unlink("../img/products/$img"); // delete image
  }

  mysqli_query($conn, "DELETE FROM products WHERE id=$id");
}
header("Location: manage-products.php");
exit();
?>
