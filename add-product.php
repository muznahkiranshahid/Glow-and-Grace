<?php
// add-product.php
session_start();
include '../includes/db.php'; // Update path based on your project structure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $category_id = (int)$_POST['category_id'];
    $price = (float)$_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle image upload
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $uploadDir = '../img/products/';
    $targetFile = $uploadDir . basename($imageName);

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($imageTmp, $targetFile)) {
        $query = "INSERT INTO products (name, brand, category_id, price, description, image)
                  VALUES ('$name', '$brand', $category_id, $price, '$description', '$imageName')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Product added successfully.'); window.location.href='manage-products.php';</script>";
        } else {
            echo "<script>alert('Error inserting product.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Image upload failed.'); window.history.back();</script>";
    }
} else {
    header("Location: manage-products.php");
    exit();
}
?>

