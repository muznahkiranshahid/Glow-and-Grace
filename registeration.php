<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Glow & Grace - Register</title>
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
    <!-- header and Icons Bar -->
<?php include 'header.php'; ?>

    <!-- Registration Form Section -->
    <section class="py-5">
      <div class="container-fluid">
        <div class="register-card wider-card animate">
          <h2>Register Form</h2>
          <p class="small-text">Create an account to enjoy full access.</p>

          <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnregister'])) {
    $first = $_POST['first_name'] ?? '';
    $last = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password_raw = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if ($password_raw !== $confirmPassword) {
        echo "<div class='alert alert-danger text-center'>❌ Password and Confirm Password do not match.</div>";
    } else {
        $password = $password_raw; // 👉 store as plain text (not secure)

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssss", $first, $last, $username, $email, $password);
            if ($stmt->execute()) {
    echo "<script>
      alert('Registration successful! Redirecting to login page...');
      window.location.href = 'login.php';
    </script>";
    exit(); // Important!
}

            $stmt->close();
        } else {
            echo "<div class='alert alert-danger text-center'>❌ Prepare failed: " . $conn->error . "</div>";
        }
    }
}

          ?>

          <form method="POST" action="">
            <div class="mb-3">
              <input type="text" class="form-control" name="first_name" placeholder="First Name *" required />
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="last_name" placeholder="Last Name *" required />
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="username" placeholder="Username *" required />
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email *" required />
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password *" required />
            </div>
            <div class="mb-4">
              <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password *" required />
            </div>
            <button type="submit" name="btnregister" class="btn btn-register">Register</button>
          </form>

          <div class="login-link">Already have an account? <a href="login.php">Login</a></div>
        </div>
      </div>
    </section>

    <!-- Why Register Section -->
    <section class="why-register-section py-5">
      <div class="container">
        <h2 class="section-title animate">Why Register with Glow & Grace?</h2>
        <div class="row g-4 justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="why-register-feature animate">
              <div class="icon"><i class="fas fa-gem"></i></div>
              <h5>Exclusive Access</h5>
              <p>Get special offers, limited editions, and first-look previews.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="why-register-feature animate">
              <div class="icon"><i class="fas fa-heart"></i></div>
              <h5>Wishlist & Orders</h5>
              <p>Save favorites, track orders, and manage returns with ease.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="why-register-feature animate">
              <div class="icon"><i class="fas fa-lock"></i></div>
              <h5>Safe & Secure</h5>
              <p>Your data is protected with strong encryption and privacy standards.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer id="footer"></footer>

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
