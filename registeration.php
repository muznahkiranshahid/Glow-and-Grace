<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli('localhost', 'root', '', 'makehub');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnregister'])) {
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';
    $work_phone = $_POST['work_phone'] ?? '';
    $cell_no = $_POST['cell_no'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $category = $_POST['category'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if ($password !== $confirmPassword) {
        $response = "Swal.fire('Password Mismatch', '❌ Password and Confirm Password do not match.', 'error');";
    } else {
        $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $response = "Swal.fire('Already Exists', '⚠️ Email already exists.', 'warning');";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (name, address, work_phone, cell_no, dob, category, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("ssssssss", $name, $address, $work_phone, $cell_no, $dob, $category, $email, $password);
                if ($stmt->execute()) {
                    $_SESSION['user_id'] = $conn->insert_id;
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;

                    $response = "Swal.fire({
                        title: 'Registration Successful!',
                        text: 'Welcome, $name!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'index.php';
                    });";
                } else {
                    $response = "Swal.fire('Error', '❌ Could not save: {$stmt->error}', 'error');";
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Glow & Grace - Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: #B154E4;
      --bg-light: #FAF5FF;
      --shadow: 0 6px 20px rgba(177, 84, 228, 0.2);
    }
    body {
      font-family: 'Montserrat', sans-serif;
      background: var(--bg-light);
    }
    .register-card {
      max-width: 700px;
      margin: auto;
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: var(--shadow);
      border: 2px solid var(--primary-light);
    }
    .register-card h2 {
      color: var(--primary);
      font-family: 'Great Vibes', cursive;
      font-size: 2.6rem;
    }
    .form-control {
      border-radius: 12px;
      padding: 12px;
      border: 1px solid #ccc;
    }
    .form-control:focus {
      border-color: var(--primary-light);
      box-shadow: 0 0 0 0.1rem rgba(122, 28, 172, 0.15);
    }
      .glow-btn {
  width: 150px;
  height: 40px;
  border: none;
  cursor: pointer;
  background-color: transparent;
  position: relative;
  outline: 2px solid var(--primary);
  border-radius: 4px;
  color: var(--primary);
  font-size: 16px;
  transition: 0.3s;
  z-index: 1;
  overflow: hidden;
}

.glow-btn::after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color:var(--primary-light);
  z-index: -1;
  transition: 0.3s;
  transform: scaleX(0);
  transform-origin: left;
  border-radius: 4px;
        color: white;

}

.glow-btn:hover {
      color: white!important;
}

.glow-btn:hover::after {
  transform: scaleX(1);
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
    span {
      font-size: 14px;
      color: red;
      display: block;
      margin-top: -8px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>
<section class="py-5">
  <div class="container">
    <div class="register-card">
      <h2>Register</h2>
      <form method="POST" onsubmit="return validation()">
        <div class="mb-3"><input type="text" name="name" id="name" class="form-control" placeholder="Full Name *" required></div>
        <span id="nameError"></span>

        <div class="mb-3"><input type="text" name="address" class="form-control" placeholder="Address *" required></div>

        <div class="mb-3"><input type="text" name="work_phone" id="workPhone" class="form-control" placeholder="Work Phone *" required></div>
        <span id="workPhoneError"></span>

        <div class="mb-3"><input type="text" name="cell_no" id="phone" class="form-control" placeholder="Cell No *" required></div>
        <span id="phoneError"></span>

        <div class="mb-3"><input type="date" name="dob" class="form-control" required></div>

        <div class="mb-3">
          <select name="category" class="form-control" required>
            <option value="">Select Category *</option>
            <option value="Customer">Customer</option>
            <option value="Vendor">Vendor</option>
            <option value="Partner">Partner</option>
          </select>
        </div>

        <div class="mb-3"><input type="email" name="email" id="email" class="form-control" placeholder="Email *(ali@gmail.com)"  required></div>
        <span id="emailError"></span>

        <div class="mb-3 password-wrapper">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password *" required>
          <i class="fas fa-eye toggle-password" onclick="togglePassword(this, 'password')"></i>
        </div>

        <div class="mb-3 password-wrapper">
          <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password *" required>
          <i class="fas fa-eye toggle-password" onclick="togglePassword(this, 'confirmPassword')"></i>
        </div>

<button type="submit" name="btnregister" class="btn glow-btn justify-content-center btn-register">Register</button>
      </form>
      <div class="login-link mt-3">Already have an account? <a href="login.php">Login</a></div>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>

<script>
function togglePassword(icon, fieldName) {
  const field = document.querySelector(`input[name="${fieldName}"]`);
  field.type = field.type === 'password' ? 'text' : 'password';
  icon.classList.toggle('fa-eye');
  icon.classList.toggle('fa-eye-slash');
}

function validation() {
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const phone = document.getElementById("phone").value;
  const workPhone = document.getElementById("workPhone").value;

  const nameRegex = /^[a-zA-Z. ]{3,}$/;
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
  const phoneRegex = /^[0-9]{11}$/;

  if (!nameRegex.test(name)) {
    document.getElementById("nameError").innerHTML = "Invalid name";
    return false;
  } else { document.getElementById("nameError").innerHTML = ""; }

  if (!emailRegex.test(email)) {
    document.getElementById("emailError").innerHTML = "Invalid email";
    return false;
  } else { document.getElementById("emailError").innerHTML = ""; }

  if (!phoneRegex.test(phone)) {
    document.getElementById("phoneError").innerHTML = "Cell No must be 11 digits";
    return false;
  } else { document.getElementById("phoneError").innerHTML = ""; }

  if (!phoneRegex.test(workPhone)) {
    document.getElementById("workPhoneError").innerHTML = "Work Phone must be 11 digits";
    return false;
  } else { document.getElementById("workPhoneError").innerHTML = ""; }

  return true;
}
</script>
<script>
<?php if (!empty($response)) echo $response; ?>
</script>


<script>
  let formSubmitted = false;

  document.querySelector("form").addEventListener("submit", function () {
    formSubmitted = true;
  });

  history.pushState(null, null, location.href);

  window.addEventListener("popstate", function () {
    if (!formSubmitted) {
      history.pushState(null, null, location.href); 

      Swal.fire({
        title: "Are you sure?",
        text: "Your registration is not complete. Do you want to quit?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, quit",
        cancelButtonText: "Continue Registration"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "index.php";
        }
      });
    }
  });
</script>


</body>
</html>
