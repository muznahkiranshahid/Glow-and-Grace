<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>MakeHub Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./style/style.css" />
  <style>
      /* Register Card */
      .register-card {
        background-color: #fff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(204, 122, 78, 0.25);
        max-width: 500px;
        margin: 0 auto;
      }
      .register-card h2 {
        color: var(--peach-dark);
        margin-bottom: 10px;
      }
      .register-card .small-text {
        color: var(--text-muted);
        margin-bottom: 20px;
      }
      .register-card input.form-control {
        background-color: var(--peach-light);
        border: 1px solid var(--peach);
        color: var(--text-dark);
        border-radius: 10px;
      }
      .register-card input.form-control::placeholder {
        color: var(--text-muted);
      }
      .btn-register {
        background-color: var(--peach);
        color: var(--bg-light);
        width: 100%;
        border-radius: 10px;
        padding: 10px 0;
        font-weight: bold;
        transition: background-color 0.3s ease;
      }
      .btn-register:hover {
        background-color: var(--peach-dark);
        color: var(--bg-light);
      }
      .login-link {
        text-align: center;
        margin-top: 15px;
      }
      .login-link a {
        color: var(--peach-dark);
        text-decoration: none;
      }
      .login-link a:hover {
        text-decoration: underline;
      }

      /* Why Register */
      .why-register-section {
        background-color: var(--peach-light);
        color: var(--text-dark);
        text-align: center;
        padding-top: 3rem;
        padding-bottom: 3rem;
      }
      .section-title {
        font-size: 2rem;
        margin-bottom: 30px;
        color: var(--peach-dark);
      }
      .why-register-feature {
        background-color: #fff3e6;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(204, 122, 78, 0.15);
        transition: transform 0.3s ease;
      }
      .why-register-feature:hover {
        transform: translateY(-5px);
      }
      .why-register-feature .icon {
        font-size: 2rem;
        color: var(--peach-dark);
        margin-bottom: 10px;
      }
      .why-register-feature h5 {
        color: var(--peach-dark);
        margin-bottom: 10px;
      }

      /* Animations */
      .animate {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease-out;
      }
      .animate.visible {
        opacity: 1;
        transform: none;
      }

/* Register/Login card style */
.register-card {
  background-color: #1c1c1c;
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 0 25px rgba(0, 0, 0, 0.5);
  color: #fff;
  max-width: 500px;
  margin: auto;
}
.btn-register {
  background: linear-gradient(to right, #ff9a8b, #ff6a88, #ff99ac);
  color: #fff;
  font-weight: bold;
  padding: 12px 20px;
  border: none;
  border-radius: 8px;
  width: 100%;
  transition: transform 0.3s;
}
.btn-register:hover {
  transform: scale(1.05);
  background: linear-gradient(to right, #ff6a88, #ff9a8b);
}



.sidebar button:hover {
  background-color: #ff6a88;
  color: #fff;
}
  </style>

</head>
<body>
  <!-- Navbar -->
  <header id="header"></header>

  <!-- Header Section -->
  <section class="page-header-section">
    <div class="page-header-content animate">
      <h1 class="display-4">Login & Register</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Login & Register</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Registration Form -->
  <section class="py-5">
    <div class="container">
      <div class="register-card animate">
        <h2>Register Form</h2>
        <p class="small-text">Do Not Have An Account?</p>

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
                $password = password_hash($password_raw, PASSWORD_DEFAULT);

                $stmt = $connection->prepare("INSERT INTO users (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("sssss", $first, $last, $username, $email, $password);
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success text-center'>🎉 Registration successful! You can now <a href='login.php'>login</a>.</div>";
                    } else {
                        echo "<div class='alert alert-danger text-center'>❌ Execute failed: " . $stmt->error . "</div>";
                    }
                    $stmt->close();
                } else {
                    echo "<div class='alert alert-danger text-center'>❌ Prepare failed: " . $connection->error . "</div>";
                }
            }
        }
        ?>

        <form method="POST" action="">
          <div class="mb-3">
            <input type="text" class="form-control" name="first_name" placeholder="Firstname *" required />
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="last_name" placeholder="Lastname *" required />
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username *" required />
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email id *" required />
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password *" required />
          </div>
          <div class="mb-4">
            <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password *" required />
          </div>
          <button type="submit" name="btnregister" class="btn btn-register">Register</button>
        </form>
        <div class="login-link">Already Have An Account? <a href="login.php">Login</a></div>
      </div>
    </div>
  </section>

  <!-- Why Register Section -->
  <section class="why-register-section py-5">
    <div class="container">
      <h2 class="section-title animate">Why Register with MakeHub?</h2>
      <div class="row g-4 justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="why-register-feature animate">
            <div class="icon"><i class="fas fa-gem"></i></div>
            <h5>Exclusive Access</h5>
            <p>Unlock special offers, discounts, and early access to new collections and limited editions.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="why-register-feature animate">
            <div class="icon"><i class="fas fa-heart"></i></div>
            <h5>Personalized Experience</h5>
            <p>Save your favorite products, track orders easily, and receive tailored recommendations.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="why-register-feature animate">
            <div class="icon"><i class="fas fa-lock"></i></div>
            <h5>Secure & Fast Checkout</h5>
            <p>Enjoy a safer and quicker checkout process with saved payment methods and addresses.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

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
