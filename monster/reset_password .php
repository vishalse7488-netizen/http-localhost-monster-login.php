<?php
include("connection.php");
session_start();

$msg = '';

if (!isset($_SESSION['reset_email']) || !isset($_SESSION['otp_verified'])) {
    header("Location: forgot_password.php");
    exit();
}

$email = $_SESSION['reset_email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (!empty($password) && $password === $confirm_password) {
        $sql = "UPDATE users SET password='$password', otp=NULL, otp_expiry=NULL WHERE email='$email'";
        if (mysqli_query($conn, $sql)) {
            session_unset();
            session_destroy();
            header("Location: login.php?msg=Password reset successful, login now.");
            exit();
        } else {
            $msg = "❌ Error updating password!";
        }
    } else {
        $msg = "⚠️ Passwords do not match!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<style>
    body { font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background: #f0f8ff; }
    .container { background: white; padding: 30px; border-radius: 10px; text-align: center; width: 300px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);}
    input, button { width: 90%; padding: 10px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc; }
    button { background: #ffc107; color: white; border: none; cursor: pointer; }
    button:hover { background: #e0a800; }
    p { color: red; }
</style>
</head>
<body>
<div class="container">
    <h2>Reset Password</h2>
    <form method="post">
        <input type="password" name="password" placeholder="New Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
        <button type="submit">Reset Password</button>
    </form>
    <p><?= $msg ?></p>
</div>
</body>
</html>
