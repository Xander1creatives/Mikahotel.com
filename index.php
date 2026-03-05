<?php
// ---- PHP MAIL HANDLER ----
$message_sent = false;
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message)) {
        $to = "xander1creatives@gmail.com";
        $subject = "New Contact Message from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email\r\n";

        if (mail($to, $subject, $body, $headers)) {
            $message_sent = true;
        } else {
            $error_message = "Sorry, something went wrong. Please try again later.";
        }
    } else {
        $error_message = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Xander Creatives | Landing Page</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: #f8f9fa;
      color: #333;
      text-align: center;
    }
    header {
      padding: 80px 20px;
      background: linear-gradient(135deg, #007bff, #00bcd4);
      color: #fff;
    }
    h1 {
      margin-bottom: 10px;
      font-size: 2.5em;
    }
    p {
      font-size: 1.1em;
    }
    .form-section {
      padding: 50px 20px;
    }
    .contact-form {
      max-width: 500px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .contact-form input,
    .contact-form textarea {
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1em;
      width: 100%;
    }
    .contact-form button {
      background: #007bff;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1em;
      transition: background 0.3s;
    }
    .contact-form button:hover {
      background: #0056b3;
    }
    .message {
      margin-top: 20px;
      font-weight: 500;
      color: green;
    }
    .error {
      color: red;
      font-weight: 500;
      margin-top: 20px;
    }
    footer {
      padding: 20px;
      background: #222;
      color: #fff;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <header>
    <h1>Welcome to Xander Creatives</h1>
    <p>We design modern web experiences that inspire and engage.</p>
  </header>

  <section class="form-section">
    <h2>Contact Us</h2>

    <?php if ($message_sent): ?>
      <p class="message">✅ Thank you, your message has been sent successfully!</p>
    <?php elseif ($error_message): ?>
      <p class="error">⚠️ <?= $error_message ?></p>
    <?php endif; ?>

    <form method="POST" class="contact-form">
      <input type="text" name="name" placeholder="Your Name" required />
      <input type="email" name="email" placeholder="Your Email" required />
      <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </section>

  <footer>
    <p>© 2025 Xander Creatives. All rights reserved.</p>
  </footer>
</body>
</html>
