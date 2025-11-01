<?php
include("connection.php");
session_start();

$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';

    if (!empty($email)) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Generate 6-digit OTP
            $otp = rand(100000, 999999);
            $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes")); // valid 5 mins

            // Save OTP and expiry in DB
            $update_sql = "UPDATE users SET otp='$otp', otp_expiry='$expiry' WHERE email='$email'";
            mysqli_query($conn, $update_sql);

            // Save email in session
            $_SESSION['reset_email'] = $email;

            // Send OTP via email (or just display for testing)
            $msg = "Your OTP is: <strong>$otp</strong>. It expires in 5 minutes.";
            header("Location: verify_otp.php"); 
            exit();
        } else {
            $msg = "⚠️ Email not found!";
        }
    } else {
        $msg = "⚠️ Enter your email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<style>
    body { font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background: #f0f8ff; }
    .container { background: white; padding: 30px; border-radius: 10px; text-align: center; width: 300px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);}
    input, button { width: 90%; padding: 10px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc; }
    button { background: #007BFF; color: white; border: none; cursor: pointer; }
    button:hover { background: #0056b3; }
    p { color: red; }
</style>
</head>
<body>
<div class="container">
    <h2>Forgot Password</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Enter your email" required><br>
        <button type="submit">Send OTP</button>
    </form>
    <p><?= $msg ?></p>
    <p><a href="login.php">Back to Login</a></p>
</div>
</body>
</html>
