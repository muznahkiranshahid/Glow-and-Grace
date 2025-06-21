<?php
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'makehub');
$user_id = $_SESSION['user_id'];

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProfile'])) {
    $first = $_POST['first_name'] ?? '';
    $last = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';

    $update = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, username=? WHERE id=?");
    $update->bind_param("ssssi", $first, $last, $email, $username, $user_id);

    if ($update->execute()) {
        $_SESSION['first_name'] = $first;
        $_SESSION['last_name'] = $last;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $message = "<script>Swal.fire('Profile Updated', 'Your profile has been updated successfully.', 'success');</script>";
    } else {
        $message = "<script>Swal.fire('Error', 'Failed to update profile.', 'error');</script>";
    }
    $update->close();
}

// Fetch current user info
$result = $conn->query("SELECT * FROM users WHERE id = $user_id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #fff5f0;
    }
    .profile-card {
      max-width: 600px;
      margin: 40px auto;
      background: #fff;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 0 25px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #ff7c4d;
      margin-bottom: 20px;
    }
    .form-control {
      border-radius: 10px;
      margin-bottom: 15px;
    }
    .btn-save {
      background-color: #ff7c4d;
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      padding: 0.75rem;
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
  <div class="profile-card">
    <h2>My Profile</h2>
    <form method="POST">
      <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($user['first_name']) ?>" placeholder="First Name" required>
      <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($user['last_name']) ?>" placeholder="Last Name" required>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" placeholder="Email" required>
      <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" placeholder="Username" required>
      <button type="submit" name="updateProfile" class="btn btn-save w-100">Save Changes</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($message)) echo $message; ?>
</body>
</html>
