<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Glow & Grace</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <link rel="stylesheet" href="./style/style.css" />
</head>
<body>
  <!-- Navbar -->
  <header id="header"></header>
<!-- Breadcrumb and Icons Bar -->
<?php include 'breadcrumb.php'; ?>
  

  <!-- Login Form Section -->
  <section class="py-5">
    <div class="container-fluid">
      <div class="register-card wider-card animate">
        <h2>Login Form</h2>
        <p class="small-text">Welcome back! Please login to continue.</p>

        <?php
require_once 'conn.php'; // ✅ this ensures $conn is available

// Example usage:
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $stmt = $conn->prepare("SELECT * FROM cart_items WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // ... handle cart items here

    $stmt->close();
} else {
    echo "<script>
      Swal.fire({
        icon: 'warning',
        title: 'Login Required',
        text: 'Please login to view your cart.',
        confirmButtonText: 'Login',
        showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'login.php';
        }
      });
    </script>";
}
?>


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
  <section class="why-register-section py-5">
    <div class="container">
      <h2 class="section-title animate">Why Login to MakeHub?</h2>
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

  <!-- Footer -->
  <footer id="footer"></footer>

    <script src="json/repeat.js"></script>


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
