<?php
session_start();

$category = $_GET['category'] ?? 'jewelery';
$id = $_GET['id'] ?? null;

if (!$id) {
  die("Product ID is missing.");
}

$filePath = $category === 'cosmetics' ? './json/cosmetics.json' : './json/jewelery.json';

$data = json_decode(file_get_contents($filePath), true);

// Filter out product with the given ID
$updatedData = array_filter($data, function ($item) use ($id) {
  return $item['id'] != $id;
});

// Reindex array to preserve proper structure
$updatedData = array_values($updatedData);

// Save updated data back to JSON
file_put_contents($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));

// Redirect back to dashboard
header("Location: admin-dashboard.php?category=$category");
exit;
?>
