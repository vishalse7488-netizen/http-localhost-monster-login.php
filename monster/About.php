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
    <title>About Us - Notice Board</title>
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

        /* 🔹 About Content */
        .content {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            color: #007BFF;
            text-align: center;
            margin-bottom: 20px;
        }

        .content p {
            color: #333;
            line-height: 1.7;
            text-align: justify;
            margin-bottom: 15px;
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

        
    <!-- 🔷 Menu -->
    <div class="menu-bar">
        <a href="menu.php">Menu</a>
        <a href="services.php">Services</a>
        <a href="About.php">About</a>
        <a href="#">Location</a>
        <a href="#">Feedback</a>
        <a href="#">Contact Us</a>
    </div>

    <!-- 🔷 About Content -->
    <div class="content">
        <h2>About Our School</h2>
        <p>
            Welcome to <strong>Sunrise Public School</strong> — a place where education meets inspiration.
            Our mission is to nurture young minds and empower them with the knowledge, values, and skills
            necessary to excel in life.
        </p>
        <p>
            Established in <strong>2005</strong>, we have consistently delivered excellence in education,
            focusing on both academics and co-curricular development. Our highly qualified teachers
            and modern infrastructure create an ideal learning environment.
        </p>
        <p>
            We believe in holistic education — combining classroom learning, digital literacy,
            sports, and moral education to develop responsible citizens for the future.
        </p>
        <p>
            📍 <strong>Address:</strong> Sunrise Public School, Green Valley Road, Lucknow, India <br>
            ☎️ <strong>Phone:</strong> +91 98765 43210 <br>
            ✉️ <strong>Email:</strong> info@sunriseschool.edu.in
        </p>

        <a href="dashboard.php" class="btn-back">⬅ Back to Dashboard</a>
    </div>

</body>
</html>
