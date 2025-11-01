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
    <title>NOTICE BOARD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f8;
        }

        .navbar {
            background: #007BFF;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 20px;
            margin: 0;
        }

        .navbar .center-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background: #dc3545;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .navbar a:hover {
            background: #c82333;
        }
        
        /* 🔹 Secondary Menu Bar */
        .menu-bar {
            background: #0056b3;
            display: flex;
            justify-content: left;
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
        
        /* 🔹 Main Content Area */
        .content {
            position: relative;
            text-align: center;
            margin-top: 80px;
            height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* 🔹 Background Logo */
        .content::before {
            content: "";
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROm-q6zzbd-JBo9REw4aL4FtlpVUmek1sWlA&s') no-repeat center center;
            background-size: 300px 300px;
            opacity: 0.15;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }
         /* 🔹 Foreground Text */
        .content {
            text-align: center;
            margin-top: 100px;
        }

        .content h2 {
            color: #333;
        }

        .content p {
            color: #555;
        }

         /* Responsive design */
        @media (max-width: 600px) {
            .menu-bar {
                flex-direction: column;
                gap: 10px;
            }

            .navbar h1 {
                font-size: 16px;
            }

            .navbar .center-title {
                font-size: 18px;
            }
            

    }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>Welcome, <?= htmlspecialchars($email) ?> 👋</h1>
        <div class="center-title">Notice Board</div>
        <a href="logout.php">Logout</a>
    </div>

    <!-- 🔷 Menu Bar Below Navbar -->
    <div class="menu-bar">
        <a href="menu.php">Menu</a>
        <a href="services.php">Services</a>
        <a href="About.php">About</a>
        <a href="location.php">Location</a>
        <a href="feedback.php">Feedback</a>
        <a href="contact.php">Contact Us</a>
    </div>


    <div class="content">
        <h2>Dashboard Page</h2>
        <p>You are successfully logged in.</p>
    </div>

</body>
</html>
