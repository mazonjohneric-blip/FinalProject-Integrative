<?php
session_start();
include "config.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if(password_verify($password,$row['password'])){
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
        }else{
            echo "Wrong password";
        }
    }else{
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Login</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>

<p>No account? <a href="register.php">Register</a></p>
</div>

</body>
</html>