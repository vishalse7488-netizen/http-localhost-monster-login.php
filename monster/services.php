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
    <title>Services - Notice Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f8;
        }

        /* 🔹 Navbar (same as dashboard) */
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

        /* 🔹 Content Section */
        .content {
            max-width: 900px;
            margin: 40px auto;
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            color: #333;
            margin-bottom: 25px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        .service-card {
            background: #007BFF;
            color: white;
            padding: 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .service-card:hover {
            background: #0056b3;
            transform: translateY(-3px);
        }

        .btn-back {
            display: inline-block;
            margin-top: 30px;
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

    <!-- 🔷 Top Navbar -->
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
        <a href="#">Location</a>
        <a href="#">Feedback</a>
        <a href="#">Contact Us</a>
    </div>

    <!-- 🔷 Main Services Section -->
    <div class="content">
        <h2>Our School Services</h2>

        <div class="services-grid">
            <div class="service-card">🏫 New Admission</div>
            <div class="service-card">📢 Complaint</div>
            <div class="service-card">🧾 Attendance</div>
            <div class="service-card">📝 Assignment</div>
            <div class="service-card">📊 Result</div>
            <div class="service-card">🩺 Health Record</div>
            <div class="service-card">📨 Application Letter</div>
        </div>

        <a href="dashboard.php" class="btn-back">⬅ Back to Dashboard</a>
    </div>

</body>
</html>
