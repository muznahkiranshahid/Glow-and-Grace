<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$success = "";
$error = "";

// Fetch user details
$stmt = $conn->prepare("SELECT first_name, last_name, username, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $username, $email);
$stmt->fetch();
$stmt->close();

// Handle update form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $new_first = $_POST['first_name'];
    $new_last = $_POST['last_name'];
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, username=?, email=? WHERE id=?");
    $stmt->bind_param("ssssi", $new_first, $new_last, $new_username, $new_email, $user_id);
    if ($stmt->execute()) {
        $success = "Profile updated successfully.";
        $first_name = $new_first;
        $last_name = $new_last;
        $username = $new_username;
        $email = $new_email;
    } else {
        $error = "Failed to update: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile - Glow & Grace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css"> <!-- Your peach theme CSS -->
  <style>
    body {
      background: #fff5f0;
      font-family: 'Montserrat', sans-serif;
    }
    .profile-card {
      background: #fff;
      border: 2px solid #ffd8b1;
      border-radius: 16px;
      padding: 2rem;
      margin-top: 3rem;
      box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    }
    h2 {
      color: #f2772f;
    }
    .btn-save {
      background: #f2772f;
      color: #fff;
    }
    .btn-save:hover {
      background: #e0651e;
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
  <div class="profile-card mx-auto col-md-8">
    <h2 class="mb-4 text-center">My Profile</h2>

    <?php if ($success): ?>
      <div class="alert alert-success text-center"><?= $success ?></div>
    <?php elseif ($error): ?>
      <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label>First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?= htmlspecialchars($first_name) ?>" required>
      </div>
      <div class="mb-3">
        <label>Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?= htmlspecialchars($last_name) ?>" required>
      </div>
      <div class="mb-3">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($username) ?>" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>" required>
      </div>
      <button type="submit" name="update" class="btn btn-save w-100">Save Changes</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
