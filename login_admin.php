<?php
include 'config.php';
session_start();

{
    if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
    $_SESSION['user_id'] = $row['id'];

    header("Location: admin_dash.php");
    exit();
}
        } else {
            $msg = "Wrong password!";
        }
    } else {
        $msg = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
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
    <h2>User Login</h2>
    <?php if(isset($msg)) echo "<p class='msg'>$msg</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>
</div>

</body>
</html>