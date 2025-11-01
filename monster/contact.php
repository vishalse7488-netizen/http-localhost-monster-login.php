<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$message = "";

// Handle contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $user_email = htmlspecialchars($_POST['user_email']);
    $subject = htmlspecialchars($_POST['subject']);
    $msg = htmlspecialchars($_POST['msg']);

    // Save to a text file (you can later connect this to a database or email)
    $data = "Name: $name\nEmail: $user_email\nSubject: $subject\nMessage: $msg\n-----------------------------\n";
    file_put_contents("contact_messages.txt", $data, FILE_APPEND);

    $message = "✅ Your message has been sent successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sunrise Public School</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        /* 🔹 Navbar */
        .navbar {
            background: #007BFF;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .navbar h1 {
            font-size: 18px;
            margin: 0;
        }

        .navbar .center-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 22px;
            font-weight: bold;
        }

        .navbar a.logout {
            color: white;
            text-decoration: none;
            background: #dc3545;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .navbar a.logout:hover {
            background: #c82333;
        }

        /* 🔹 Menu Bar */
        .menu-bar {
            background: #0056b3;
            display: flex;
            justify-content: center;
            padding: 10px 0;
            gap: 30px;
        }

        .menu-bar a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .menu-bar a:hover {
            color: #FFD700;
            text-decoration: underline;
        }

        /* 🔹 Contact Section */
        .content {
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 15px;
        }

        .content p {
            text-align: center;
            color: #555;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, textarea {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            background: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #0056b3;
        }

        .message {
            text-align: center;
            color: green;
            margin-top: 10px;
            font-weight: bold;
        }

        /* 🔹 Contact Info Box */
        .info-box {
            text-align: center;
            margin-top: 30px;
            background: #e9f1ff;
            padding: 20px;
            border-radius: 8px;
        }

        .info-box h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .info-box p {
            margin: 5px 0;
            color: #555;
        }

        .btn-back {
            display: block;
            width: fit-content;
            margin: 20px auto 0;
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
        }

        .btn-back:hover {
            background: #218838;
        }

        @media (max-width: 600px) {
            .menu-bar {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- 🔷 Navbar -->
    <div class="navbar">
        <h1>Welcome, <?= htmlspecialchars($email) ?> 👋</h1>
        <div class="center-title">Notice Board</div>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <!-- 🔷 Menu Bar -->
    <div class="menu-bar">
        <a href="dashboard.php">Menu</a>
        <a href="services.php">Services</a>
        <a href="about.php">About</a>
        <a href="location.php">Location</a>
        <a href="feedback.php">Feedback</a>
        <a href="contact.php">Contact Us</a>
    </div>

    <!-- 🔷 Contact Section -->
    <div class="content">
        <h2>📞 Contact Us</h2>
        <p>We’d love to hear from you! Fill out the form below or reach us directly.</p>

        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Full Name" required>
            <input type="email" name="user_email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="msg" placeholder="Your Message..." required></textarea>
            <button type="submit">Send Message</button>
        </form>

        <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>

        <div class="info-box">
            <h3>Sunrise Public School</h3>
            <p>📍 Near Green Park Colony, Lucknow, Uttar Pradesh</p>
            <p>📞 +91 98765 43210</p>
            <p>✉️ contact@sunriseschool.edu.in</p>
            <p>🌐 www.sunriseschool.edu.in</p>
        </div>

        <a href="dashboard.php" class="btn-back">⬅ Back to Dashboard</a>
    </div>

</body>
</html>
