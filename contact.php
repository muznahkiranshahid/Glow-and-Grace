<?php
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
  <style>
    body {
      background-color: #fff5f0;
      font-family: 'Segoe UI', sans-serif;
    }
    .text-peach {
      color: #ff8c69;
    }
    .btn-peach {
      background-color: #ff8c69;
      color: white;
      border: none;
    }
    .btn-peach:hover {
      background-color: #ff704d;
    }
    .form-control:focus {
      border-color: #ff8c69;
      box-shadow: 0 0 0 0.2rem rgba(255, 140, 105, 0.25);
    }
    .contact-info {
      font-size: 1rem;
      margin-bottom: 0.6rem;
    }
    .success-msg {
      color: #ff8c69;
      font-weight: bold;
    }
    .error-msg {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>
<!-- Navbar -->
    <header id="header"></header>
    <!-- Breadcrumb and Icons Bar -->
<?php include 'breadcrumb.php'; ?>
<div class="container py-5">
  <div class="row g-5 align-items-start">
    <!-- Left Column (Form) -->
    <div class="col-md-6" data-aos="fade-right">
      <h2 class="text-peach mb-4">Get in Touch</h2>
      <?php
if (!empty($successMsg)) {
    echo '<p class="success-msg">' . htmlspecialchars($successMsg) . '</p>';
} elseif (!empty($errorMsg)) {
    echo '<p class="error-msg">' . htmlspecialchars($errorMsg) . '</p>';
}
?>

      <form method="POST" action="contact.php">
        <div class="mb-3">
          <label for="name" class="form-label text-peach">Name</label>
          <input type="text" name="name" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label text-peach">Email</label>
          <input type="email" name="email" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
          <label for="subject" class="form-label text-peach">Subject</label>
          <input type="text" name="subject" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label text-peach">Message</label>
          <textarea name="message" rows="4" class="form-control rounded-4" required></textarea>
        </div>
        <button type="submit" class="btn btn-peach px-4 rounded-pill">Send Message</button>
      </form>
    </div>

    <!-- Right Column (Details + Map) -->
    <div class="col-md-6" data-aos="fade-left">
      <div class="px-4">
        <h3 class="text-peach mb-3">Contact Details</h3>
        <p class="contact-info"><strong>Email:</strong> support@glowgrace.com</p>
        <p class="contact-info"><strong>Phone:</strong> +1 234 567 890</p>
        <p class="contact-info"><strong>Address:</strong> 123 Beauty Lane, Peach City, CA</p>
        <p class="contact-info"><strong>Hours:</strong> Mon - Sat, 9am - 6pm</p>

        <!-- Map -->
        <div class="mt-4 rounded-4 overflow-hidden shadow" style="border: 3px solid #ffd9cc; border-radius: 20px;">
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
