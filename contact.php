<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'conn.php'; 
$successMsg = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $subject = $_POST["subject"] ?? "";
    $message = $_POST["message"] ?? "";

    $host = "localhost";
    $dbname = "makehub";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $subject, $message]);

        $successMsg = "Message sent successfully!";
    } catch (PDOException $e) {
        $errorMsg = "DB Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | Glow & Grace</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap & AOS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #7A1CAC;
      --primary-light: rgb(177, 84, 228);
      --bg-light: #faefff;
      --bg-lighter: #fef7ff;
      --bg-purple: rgba(177, 84, 228, 0.05);
      --text-dark: #111;
      --text-light: #fff;
      --shadow: 0 6px 20px rgba(235, 211, 248, 0.2);
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-dark);
    }

    .text-purple {
      color: var(--primary);
    }

    .form-control:focus {
      border-color: var(--primary-light);
      box-shadow: 0 0 0 0.2rem rgba(177, 84, 228, 0.25);
    }

    .contact-info {
      font-size: 1rem;
      margin-bottom: 0.6rem;
    }

    .success-msg {
      color: var(--primary);
      font-weight: bold;
    }

    .error-msg {
      color: red;
      font-weight: bold;
    }

    .section-heading {
      text-align: center;
      margin-bottom: 3rem;
    }
.glow-btn {
  width: 300px;
  height: 50px;
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
}

.glow-btn:hover {
      color: var(--text-light);
}

.glow-btn:hover::after {
  transform: scaleX(1);
}
    @media (max-width: 576px) {
      h2, h3 {
        font-size: 1.5rem;
      }
      .form-control, .btn {
        font-size: 0.9rem;
      }
      .contact-info {
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container py-5 px-3 px-md-5">
  <div class="section-heading">
    <h2 class="fw-bold text-purple" data-aos="fade-up">Contact Us</h2>
    <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Have a question or just want to say hello? We'd love to hear from you!</p>
  </div>

  <div class="row g-5 align-items-start">
    <!-- Left Column (Form) -->
    <div class="col-lg-6" data-aos="fade-right">
      <?php
        if (!empty($successMsg)) {
            echo '<p class="success-msg">' . htmlspecialchars($successMsg) . '</p>';
        } elseif (!empty($errorMsg)) {
            echo '<p class="error-msg">' . htmlspecialchars($errorMsg) . '</p>';
        }
      ?>
      <form method="POST" action="contact.php">
        <div class="mb-3">
          <label for="name" class="form-label text-purple">Name</label>
          <input type="text" name="name" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label text-purple">Email</label>
          <input type="email" name="email" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
          <label for="subject" class="form-label text-purple">Subject</label>
          <input type="text" name="subject" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label text-purple">Message</label>
          <textarea name="message" rows="4" class="form-control rounded-4" required></textarea>
        </div>
        <button type="submit" class="glow-btn btn">Send Message</button>
      </form>
    </div>

    <!-- Right Column (Details + Map) -->
    <div class="col-lg-6" data-aos="fade-left">
      <div class="ps-lg-4 mt-5 mt-lg-0">
        <h3 class="text-purple mb-3">Contact Details</h3>
        <p class="contact-info"><strong>Email:</strong> support@glowgrace.com</p>
        <p class="contact-info"><strong>Phone:</strong> +1 234 567 890</p>
        <p class="contact-info"><strong>Address:</strong> 123 Beauty Lane, purple City, CA</p>
        <p class="contact-info"><strong>Hours:</strong> Mon - Sat, 9am - 6pm</p>

        <!-- Map -->
        <div class="mt-4 rounded-4 overflow-hidden shadow" style="border: 3px solid var(--primary);">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0194328076355!2d-122.41941558468593!3d37.77492927975965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064dfb8e61b%3A0x45e19cba3c5c63cb!2s123%20Beauty%20Lane%2C%20San%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1718345600000"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="./json/repeat.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
