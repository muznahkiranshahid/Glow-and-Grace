<?php 
session_start();
require_once 'conn.php'; // ✅ Database connection

if (isset($_POST['btnlogin'])) {
  $name = trim($_POST['name']);
  $password = $_POST['password'];

  // Admin login
  if ($name === 'admin' && $password === 'admin') {
    $_SESSION['myuser'] = 'admin';
    header("Location: ./admin-dashboard.php");
    exit();
  }

  // User login
  $stmt = $conn->prepare("SELECT * FROM users WHERE name = ? OR email = ?");
  $stmt->bind_param("ss", $name, $name);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if ($password === $user['password']) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['category'] = $user['category'];
      echo "<script>window.location.href = 'index.php';</script>";
      exit();
    } else {
      $alert = "password_incorrect";
    }
  } else {
    $alert = "user_not_found";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Glow & Grace - Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: rgb(177, 84, 228);
      --peach-bold: #f2772f;
      --peach-light: #fff5f0;
      --bg-light: #ffffff;
      --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background: var(--peach-light);
      color: #333;
    }

    .register-card {
      background: var(--bg-light);
      max-width: 600px;
      margin: auto;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: var(--shadow);
      border: 2px solid var(--primary-light);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .register-card:hover {
      transform: scale(1.01);
    }

    .register-card h2 {
      font-family: 'Great Vibes', cursive;
      font-size: 2.8rem;
      color: var(--primary);
    }

    .small-text {
      font-size: 1rem;
      color: #666;
    }

    .form-control {
      border-radius: 12px;
      border: 1px solid #ccc;
      padding: 12px 15px;
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.1rem rgba(122, 28, 172, 0.15);
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

    .btn-register.glow-btn {
      background-color: transparent;
      color: var(--primary);
      border: 2px solid var(--primary);
      width: 150px;
      height: 45px;
      font-weight: 600;
      border-radius: 8px;
      overflow: hidden;
      position: relative;
      transition: 0.3s;
      z-index: 1;
    }

    .glow-btn::after {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: var(--primary-light);
      z-index: -1;
      transition: 0.3s;
      transform: scaleX(0);
      transform-origin: left;
      border-radius: 8px;
    }

    .glow-btn:hover {
      color: white;
    }

    .glow-btn:hover::after {
      transform: scaleX(1);
    }

    .login-link {
      margin-top: 15px;
      font-size: 0.95rem;
    }

    .login-link a {
      color: var(--primary);
      font-weight: 500;
      text-decoration: underline;
    }

    .why-register-section {
      background: #fff;
      padding: 60px 0;
    }

    .why-register-feature {
      background: var(--peach-light);
      border-radius: 12px;
      padding: 30px 20px;
      box-shadow: var(--shadow);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .why-register-feature:hover {
      transform: translateY(-5px);
    }

    .why-register-feature .icon {
      font-size: 2rem;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .section-title {
      text-align: center;
      font-family: 'Great Vibes', cursive;
      font-size: 2.5rem;
      color: var(--primary);
      margin-bottom: 40px;
    }

    .animate {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.6s ease;
    }

    .animate.visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body>

<?php include 'header.php'; ?>

<section class="py-5">
  <div class="container-fluid">
    <div class="register-card animate">
      <h2 class="fs-1">Login Form</h2>
      <p class="small-text">Welcome back! Please login to continue.</p>
      <form method="POST">
        <div class="mb-3">
          <input type="text" class="form-control" name="name" placeholder="Username or Email *" required />
        </div>
        <div class="mb-4 password-wrapper">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password *" required />
          <span class="toggle-password" onclick="togglePassword()">
            <i class="fa fa-eye" id="eye-icon"></i>
          </span>
        </div>
        <button type="submit" name="btnlogin" class="btn btn-register glow-btn">Login</button>
      </form>
      <div class="login-link">Don't have an account? <a href="registeration.php">Register</a></div>
    </div>
  </div>
</section>

<section class="why-register-section">
  <div class="container">
    <h2 class="section-title animate">Why Login to Glow & Grace?</h2>
    <div class="row g-4 justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="why-register-feature animate">
          <div class="icon"><i class="fas fa-user-check"></i></div>
          <h5>Faster Checkout</h5>
          <p>Access saved addresses and payment methods for speedy orders.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="why-register-feature animate">
          <div class="icon"><i class="fas fa-history"></i></div>
          <h5>Order Tracking</h5>
          <p>Keep tabs on your recent purchases and manage returns easily.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="why-register-feature animate">
          <div class="icon"><i class="fas fa-star"></i></div>
          <h5>Personalization</h5>
          <p>Get tailored product suggestions based on your interests.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  const animatedElements = document.querySelectorAll('.animate');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });
  animatedElements.forEach(el => observer.observe(el));

  function togglePassword() {
    const pass = document.getElementById("password");
    const icon = document.getElementById("eye-icon");
    if (pass.type === "password") {
      pass.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      pass.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>

<?php if (isset($alert) && $alert == "user_not_found"): ?>
<script>
Swal.fire({
  title: 'Oops!',
  html: `<b>User not found</b><br>Please register to continue.`,
  confirmButtonText: 'Register Now',
  confirmButtonColor: '#7A1CAC',
  background: '#fff5f0',
  color: '#333',
  iconColor: '#f2772f'
}).then(() => {
  window.location.href = 'registeration.php';
});
</script>
<?php elseif (isset($alert) && $alert == "password_incorrect"): ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'Incorrect Password',
  text: 'Please try again.',
  confirmButtonColor: '#f2772f',
  background: '#fff5f0',
  color: '#333',
  iconColor: '#dc3545'
});
</script>
<?php endif; ?>

</body>
</html>
