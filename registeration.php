<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new mysqli('localhost', 'root', '', 'makehub');

$response = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnregister'])) {
    $first = $_POST['first_name'] ?? '';
    $last = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if ($password !== $confirmPassword) {
        $response = "Swal.fire('Password Mismatch', '❌ Password and Confirm Password do not match.', 'error');";
    } else {
        $check = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $check->bind_param("ss", $username, $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $response = "Swal.fire('Already Exists', '⚠️ Username or Email already exists.', 'warning');";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sssss", $first, $last, $username, $email, $password);
                if ($stmt->execute()) {
                    $_SESSION['user_id'] = $conn->insert_id;
                    $_SESSION['username'] = $username;
                    $_SESSION['first_name'] = $first;
                    $_SESSION['last_name'] = $last;
                    $_SESSION['email'] = $email;

                    $response = "Swal.fire({
                        title: 'Registration Successful!',
                        text: 'Welcome, $username!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'index.php';
                    });";
                } else {
                    $response = "Swal.fire('Error', '❌ Execute failed: {$stmt->error}', 'error');";
                }
                $stmt->close();
            } else {
                $response = "Swal.fire('Error', '❌ Prepare failed: {$conn->error}', 'error');";
            }
        }
        $check->close();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Glow & Grace - Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: #B154E4;
      --bg-light: #FAF5FF;
      --text-dark: #111;
      --accent-dark: #000;
      --shadow: 0 6px 20px rgba(177, 84, 228, 0.2);
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background: var(--bg-light);
      color: var(--text-dark);
    }

    .register-card {
      background: white;
      max-width: 650px;
      margin: auto;
      padding: 40px;
      border-radius: 20px;
      box-shadow: var(--shadow);
      text-align: center;
      border: 2px solid var(--primary-light);
    }

    .register-card h2 {
      font-family: 'Great Vibes', cursive;
      font-size: 2.6rem;
      color: var(--primary);
    }

    .form-control {
      border-radius: 12px;
      border: 1px solid #ccc;
      padding: 12px;
    }

    .form-control:focus {
      border-color: var(--primary-light);
      box-shadow: 0 0 0 0.1rem rgba(122, 28, 172, 0.15);
    }

    .btn-register {
      background: var(--primary);
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 10px;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-register:hover {
      background: var(--primary-light);
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: var(--primary);
    }

    .password-wrapper {
      position: relative;
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>
<section class="py-5">
  <div class="container">
    <div class="register-card animate">
      <h2>Register Form</h2>
      <p class="small-text">Create an account to enjoy full access.</p>
      <form method="POST">
        <div class="mb-3"><input type="text" name="first_name" class="form-control" placeholder="First Name *" required></div>
        <div class="mb-3"><input type="text" name="last_name" class="form-control" placeholder="Last Name *" required></div>
        <div class="mb-3"><input type="text" name="username" class="form-control" placeholder="Username *" required></div>
        <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email *" required></div>
        <div class="mb-3 password-wrapper">
          <input type="password" name="password" class="form-control password" placeholder="Password *" required>
          <i class="fas fa-eye toggle-password" onclick="togglePassword(this, 'password')"></i>
        </div>
        <div class="mb-4 password-wrapper">
          <input type="password" name="confirmPassword" class="form-control confirm-password" placeholder="Confirm Password *" required>
          <i class="fas fa-eye toggle-password" onclick="togglePassword(this, 'confirmPassword')"></i>
        </div>
        <button type="submit" name="btnregister" class="btn btn-register">Register</button>
      </form>
      <div class="login-link mt-3">Already have an account? <a href="login.php">Login</a></div>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>
<script>
function togglePassword(icon, fieldName) {
  const field = document.querySelector(`input[name="${fieldName}"]`);
  const type = field.type === 'password' ? 'text' : 'password';
  field.type = type;
  icon.classList.toggle('fa-eye');
  icon.classList.toggle('fa-eye-slash');
}
const animatedElements = document.querySelectorAll('.animate');
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) entry.target.classList.add('visible');
  });
}, { threshold: 0.1 });
animatedElements.forEach(el => observer.observe(el));
</script>
<script>
<?php if (!empty($response)) echo $response; ?>
</script>
</body>
</html>
