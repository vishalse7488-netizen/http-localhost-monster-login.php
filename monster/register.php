<?php
include("connection.php");

$msg='';
if($_SERVER["REQUEST_METHOD"] =="POST") {
  $username = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  

  
  $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$username','$email','$password')";

  

  if (mysqli_query($conn,  $sql)) {
      echo "data inserted successlly!";

  } else {
      echo "Error: " . mysqli_error($conn);

  }
}
mysqli_close($conn);


?>
<!DOCTYPE html>
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>



  <form action="register.php" method="post">
  <div class="signup-container">
    <h2>Create Account</h2>
    <p class="msg"><? =$msg?></p>
      <div class="form-group">
        <label>name</label>
        <input type="text" id="name" name="name" required />
      </div>

      <div class="form-group">
        <label>Email </label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" id="password" name="password" required minlength="6" />
      </div>

      
    

        

      <button type="submit">Sign Up</button>

      <div class="footer-text">
        Already have an account? <a href="login.php">Login</a>
      </div>
    </form>
  </div>







</body>
</html>