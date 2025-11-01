<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location - Sunrise Public School</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f8;
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

        /* 🔹 Location Section */
        .content {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .content h2 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 10px;
        }

        .btn-back {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
        }

        .btn-back:hover {
            background: #218838;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .menu-bar {
                flex-direction: column;
                gap: 10px;
            }
            .navbar .center-title {
                font-size: 18px;
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
        <a href="#">Feedback</a>
        <a href="#">Contact Us</a>
    </div>

    <!-- 🔷 Location Content -->
    <div class="content">
        <h2>📍 Our School Location</h2>
        <p>Find us easily on the map below — we are always happy to welcome visitors!</p>

        <!-- 🌍 Google Map Embed -->
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.635901073871!2d80.94616657460293!3d26.848850363187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2d6a1234567%3A0xabcdef123456789!2sSunrise%20Public%20School%2C%20Lucknow!5e0!3m2!1sen!2sin!4v1698637440000!5m2!1sen!2sin" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>

        <a href="dashboard.php" class="btn-back">⬅ Back to Dashboard</a>
    </div>

</body>
</html>
