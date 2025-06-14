<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
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

  <!-- Page Header Section -->
  <section class="page-header-section">
    <div class="page-header-content animate">
      <h1 class="display-4">Login</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Login Form Section -->
  <section class="py-5">
    <div class="container">
      <div class="register-card animate">
        <h2>Login Form</h2>
        <p class="small-text">Welcome back! Please login to continue.</p>

        <?php
        include 'conn.php';
        session_start();
        if (isset($_POST['btnlogin'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            if ($name === 'admin' && $password === 'admin') {
                $_SESSION['myuser'] = $name;
                header("Location: admin.php");
                exit();
            }

            $query = "SELECT * FROM crud WHERE name='$name' AND password='$password'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $name;
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger text-center'>❌ Invalid credentials</div>";
            }
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

  <!-- Benefits of Logging In (Optional) -->
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

  <script src="json/repeat.js"></script>
</body>
</html>
