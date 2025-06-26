<?php
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $subject = trim($_POST['subject']);
  $message = trim($_POST['message']);

  $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $subject, $message);
  
  if ($stmt->execute()) {
    echo "<script>alert('Message sent successfully!'); window.location='index.php';</script>";
  } else {
    echo "<script>alert('Failed to send message.'); window.location='index.php';</script>";
  }
  $stmt->close();
}
?>
