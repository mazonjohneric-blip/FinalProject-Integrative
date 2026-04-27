<?php
include 'config.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
if (mysqli_num_rows($check) > 0) {
    $msg = "Username already exists!";
} else {
    mysqli_query($conn, "INSERT INTO users (username, password) 
                        VALUES ('$username', '$password')");
    
    header("Location: login_user.php");
    exit();
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register User</title>
<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, black, red, black);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.container {
    background: white;
    padding: 30px;
    border-radius: 15px;
    width: 300px;
    text-align: center;
}
input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}
button {
    width: 100%;
    padding: 10px;
    background: black;
    color: white;
    border: none;
    border-radius: 8px;
}
.msg { color: green; }
</style>
</head>
<body>

<div class="container">
    <h2>Register User</h2>

    <?php if(isset($msg)) echo "<p class='msg'>$msg</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        
        <button name="register">Register</button>
    </form>

    <p style="margin:15px 0;">or</p>

    <!-- LOGIN BUTTON -->
    <a href="login_user.php">
        <button style="background:black; color:white;">Login</button>
    </a>
</div>

</body>
</html>