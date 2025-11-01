<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$msg = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $user_email = htmlspecialchars($_POST['user_email']);
    $rating = htmlspecialchars($_POST['rating']);
    $message = htmlspecialchars($_POST['message']);

    // Save feedback to a file (you can also save in database)
    $feedbackData = "Name: $name\nEmail: $user_email\nRating: $rating\nMessage: $message\n---------------------------\n";
    file_put_contents("feedback.txt", $feedbackData, FILE_APPEND);

    $msg = "✅ Thank you for your feedback!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Sunrise Public School</title>
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

        /* 🔹 Feedback Form */
        .content {
            max-width: 700px;
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

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select, textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
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
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .msg {
            text-align: center;
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }

        .btn-back {
            display: block;
            width: fit-content;
            margin: 25px auto 0;
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
        <a href="#">Contact Us</a>
    </div>

    <!-- 🔷 Feedback Form -->
    <div class="content">
        <h2>📋 Feedback Form</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Full Name" required>
            <input type="email" name="user_email" placeholder="Your Email" required>
            
            <select name="rating" required>
                <option value="">Rate Our School</option>
                <option value="⭐">⭐</option>
                <option value="⭐⭐">⭐⭐</option>
                <option value="⭐⭐⭐">⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</option>
            </select>

            <textarea name="message" placeholder="Write your feedback here..." required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>

        <?php if (!empty($msg)) echo "<p class='msg'>$msg</p>"; ?>

        <a href="dashboard.php" class="btn-back">⬅ Back to Dashboard</a>
    </div>

</body>
</html>
