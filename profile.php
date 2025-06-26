<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'makehub');
$user_id = $_SESSION['user_id'];

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProfile'])) {
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';
    $work_phone = $_POST['work_phone'] ?? '';
    $cell_no = $_POST['cell_no'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $category = $_POST['category'] ?? '';
    $email = $_POST['email'] ?? '';

    $update = $conn->prepare("UPDATE users SET name=?, address=?, work_phone=?, cell_no=?, dob=?, category=?, email=? WHERE id=?");
    $update->bind_param("sssssssi", $name, $address, $work_phone, $cell_no, $dob, $category, $email, $user_id);

    if ($update->execute()) {
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-light: rgb(239, 217, 252);
      --primary-light: rgb(177, 84, 228);
      --primary: #7A1CAC;
      --text-dark: rgb(17, 17, 17);
      --text-light: #fff;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background: var(--bg-light);
    }

    .profile-card {
      max-width: 600px;
      margin: 60px auto;
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(122, 28, 172, 0.1);
    }

    .profile-card h2 {
      text-align: center;
      color: var(--primary);
      margin-bottom: 25px;
      font-weight: 700;
    }

    .form-control {
      border-radius: 8px;
      padding: 10px 14px;
      border: 1px solid rgba(122, 28, 172, 0.2);
      box-shadow: none;
      transition: 0.3s;
      margin-bottom: 1rem;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(122, 28, 172, 0.25);
    }

    .glow-btn {
      width: 100%;
      height: 45px;
      border: none;
      cursor: pointer;
      background-color: transparent;
      outline: 2px solid var(--primary);
      border-radius: 8px;
      color: var(--primary);
      font-size: 16px;
      transition: 0.3s;
      font-weight: 600;
      position: relative;
      overflow: hidden;
    }

    .glow-btn::after {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: var(--primary-light);
      z-index: -1;
      transform: scaleX(0);
      transform-origin: left;
      transition: 0.3s;
      border-radius: 8px;
    }

    .glow-btn:hover {
      color: var(--text-light);
    }

    .glow-btn:hover::after {
      transform: scaleX(1);
    }

    @media (max-width: 575px) {
      .profile-card {
        margin: 30px 15px;
      }
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
  <div class="profile-card">
    <h2>My Profile</h2>
    <form method="POST" autocomplete="off">
      <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" placeholder="Full Name" required>
      <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($user['address']) ?>" placeholder="Address" required>
      <input type="text" name="work_phone" class="form-control" value="<?= htmlspecialchars($user['work_phone']) ?>" placeholder="Work Phone" required>
      <input type="text" name="cell_no" class="form-control" value="<?= htmlspecialchars($user['cell_no']) ?>" placeholder="Cell Number" required>
      <input type="date" name="dob" class="form-control" value="<?= htmlspecialchars($user['dob']) ?>" required>
      <input type="text" name="category" class="form-control" value="<?= htmlspecialchars($user['category']) ?>" placeholder="Category" required>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" placeholder="Email" required>
      <button type="submit" name="updateProfile" class="glow-btn mt-3">Save Changes</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($message)) echo $message; ?>
</body>
</html>
