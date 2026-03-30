<?php
include "config.php";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username,password)
            VALUES ('$username','$password')";

    if($conn->query($sql)){
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Register</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="register">Register</button>
</form>

<p>Already have account? <a href="login.php">Login</a></p>
</div>

</body>
</html>