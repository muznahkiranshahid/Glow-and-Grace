<?php
session_start();
require_once 'conn.php'; // Database connection

// Flag to determine feedback
$alert = "";

if (isset($_POST['btnlogin'])) {
  $name = trim($_POST['name']);
  $password = $_POST['password'];
   if($name === 'admin' && $password =='admin'){
            $_SESSION['myuser'] = $username;
            header("Location:./admin-dashboard.php");
        }


  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
  $stmt->bind_param("ss", $name, $name);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
if ($password === $user['password']) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];

      // Redirect to cart after login
      echo "<script>
        window.location.href = 'index.php';
      </script>";
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

  <link rel="stylesheet" href="./style/style.css">

</head>
<body>

  <!-- Header -->
  <?php include 'header.php'; ?>

  <!-- Login Section -->
  <section class="py-5">
    <div class="container-fluid">
      <div class="register-card animate">
        <h2 class="peach-bold fs-1">Login Form</h2>
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
  <?php if ($alert == "user_not_found") : ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'User not found!',
  text: 'Please register to continue.',
  confirmButtonText: 'Register',
  confirmButtonColor: '#f2772f'
}).then(() => {
  window.location.href = 'registeration.php';
});
</script>
<?php elseif ($alert == "password_incorrect") : ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'Incorrect Password!',
  text: 'Please try again.'
});
</script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
