<?php
include("connection.php");
session_start();

$msg = '';

if (!isset($_SESSION['reset_email'])) {
    header("Location: forgot_password.php");
    exit();
}

$email = $_SESSION['reset_email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'] ?? '';

    $sql = "SELECT * FROM users WHERE email='$email' AND otp='$otp' AND otp_expiry >= NOW()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['otp_verified'] = true;
        header("Location: reset_password.php");
        exit();
    } else {
        $msg = "❌ Invalid OTP or expired!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verify OTP</title>
<style>
    body { font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background: #f0f8ff; }
    .container { background: white; padding: 30px; border-radius: 10px; text-align: center; width: 300px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);}
    input, button { width: 90%; padding: 10px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc; }
    button { background: #28a745; color: white; border: none; cursor: pointer; }
    button:hover { background: #218838; }
    p { color: red; }
</style>
</head>
<body>
<div class="container">
    <h2>Enter OTP</h2>
    <form method="post">
        <input type="text" name="otp" placeholder="Enter OTP" required><br>
        <button type="submit">Verify OTP</button>
    </form>
    <p><?= $msg ?></p>
</div>
</body>
</html>
