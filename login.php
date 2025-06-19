<?php
session_start();
require_once 'conn.php';

if (isset($_POST['btnlogin'])) {
  $name = trim($_POST['name']);
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
  $stmt->bind_param("ss", $name, $name);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];

      echo "<script>
        setTimeout(() => {
          Swal.fire({
            icon: 'success',
            title: 'Login Successful',
            showConfirmButton: false,
            timer: 1500
          }).then(() => {
            window.location.href = 'cart.php';
          });
        }, 200);
      </script>";
    } else {
      echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Incorrect Password',
          text: 'Please try again.'
        });
      </script>";
    }
  } else {
    echo "<script>
      Swal.fire({
        icon: 'warning',
        title: 'User Not Found',
        text: 'Redirecting to registration...',
        showConfirmButton: false,
        timer: 2000
      }).then(() => {
        window.location.href = 'registeration.php';
      });
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Glow & Grace - Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    :root {
      --peach-light: rgb(252, 244, 241);
      --peach-base: rgb(255, 254, 254);
      --peach-bold: #f2772f;
      --peach-dark: #ffd8b1;
      --text-dark: #2e2e2e;
      --text-light: #ffffff;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background: var(--peach-light);
      color: var(--text-dark);
    }

    .register-card {
      background: var(--peach-base);
      max-width: 450px;
      margin: auto;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(242, 119, 47, 0.2);
      text-align: center;
    }

    .register-card h2 {
      font-family: 'Great Vibes', cursive;
      font-size: 2.5rem;
      color: var(--peach-bold);
    }

    .small-text {
      color: #666;
      font-size: 0.95rem;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #f0c09c;
      padding: 10px 15px;
    }

    .btn-register {
      background-color: var(--peach-bold);
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s ease;
    }

    .btn-register:hover {
      background-color: #d9641b;
    }

    .login-link {
      margin-top: 15px;
    }

    .why-register-section {
      background: white;
      padding: 60px 0;
    }

    .why-register-feature {
      background: var(--peach-light);
      border-radius: 12px;
      padding: 30px 20px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .why-register-feature:hover {
      transform: translateY(-5px);
    }

    .why-register-feature .icon {
      font-size: 2rem;
      color: var(--peach-bold);
      margin-bottom: 15px;
    }

    .section-title {
      text-align: center;
      font-family: 'Great Vibes', cursive;
      font-size: 2.5rem;
      color: var(--peach-bold);
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

  <!-- Header -->
  <?php include 'header.php'; ?>

  <!-- Login Section -->
  <section class="py-5">
    <div class="container">
      <div class="register-card animate">
        <h2>Login Form</h2>
        <p class="small-text">Welcome back! Please login to continue.</p>
        <form method="POST" action="">
          <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Username or Email *" required />
          </div>
          <div class="mb-4">
            <input type="password" class="form-control" name="password" placeholder="Password *" required />
          </div>
          <button type="submit" name="btnlogin" class="btn btn-register">Login</button>
        </form>
        <div class="login-link">Don't have an account? <a href="registeration.php">Register</a></div>
      </div>
    </div>
  </section>

  <!-- Why Login Section -->
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

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
  </script>
</body>
</html>
