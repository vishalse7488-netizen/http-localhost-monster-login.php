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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>School Page - Notice Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f8;
        }

        /* Top Navbar (same style as dashboard) */
        .navbar {
            background: #007BFF;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .navbar h1 { font-size: 18px; margin: 0; }

        .navbar .center-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .navbar a.logout {
            color: white;
            text-decoration: none;
            background: #dc3545;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .navbar a.logout:hover { background: #c82333; }

        /* Secondary menu (kept for consistency) */
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

        /* School content */
        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .school-header {
            display:flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .school-header h2 { margin: 0; color: #333; }

        .btn {
            display: inline-block;
            background:#007BFF;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
        }

        .btn:hover { background:#005bb5; }

        .notices {
            margin-top: 20px;
        }

        .notice {
            border-left: 4px solid #007BFF;
            padding: 12px 16px;
            background: #fbfdff;
            margin-bottom: 12px;
            border-radius: 4px;
        }

        /* Responsive */
        @media (max-width:600px) {
            .menu-bar { flex-direction: column; gap: 10px; }
            .navbar .center-title { font-size: 18px; }
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <div class="navbar">
        <h1>Welcome, <?= htmlspecialchars($email) ?> 👋</h1>
        <div class="center-title">Notice Board</div>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <!-- Menu (same as dashboard so navigation is consistent) -->
    <div class="menu-bar">
        <a href="menu.php">Menu</a>
        <a href="#">Services</a>
        <a href="#">About</a>
        <a href="#">Location</a>
        <a href="#">Feedback</a>
        <a href="#">Contact Us</a>
    </div>

    <div class="container">
        <div class="school-header">
            <h2>School Page</h2>
            <div>
                <a href="dashboard.php" class="btn">Back to Dashboard</a>
                <a href="logout.php" class="btn" style="background:#dc3545; margin-left:8px;">Logout</a>
            </div>
        </div>

        <p style="color:#555; margin-top:12px;">
            Welcome to the school section. Below are the latest notices / announcements.
        </p>

        <div class="notices">
            <!-- Example static notices; replace or generate from DB as needed -->
            <div class="notice">
                <strong>Exam Schedule Released</strong><br>
                Exams for term 1 will start from <em>Nov 10, 2025</em>. Check the timetable at reception.
            </div>

            <div class="notice">
                <strong>Parent-Teacher Meeting</strong><br>
                PTM will be held on <em>Dec 5, 2025</em> in the school auditorium.
            </div>

            <div class="notice">
                <strong>Sports Day</strong><br>
                Sports Day is scheduled on <em>Jan 15, 2026</em>. All students must register with the sports dept.
            </div>
        </div>
    </div>

</body>
</html>
