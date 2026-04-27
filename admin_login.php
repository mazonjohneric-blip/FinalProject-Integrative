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
            header("Location: admin_dash.php");
        }else{
            echo "<script>alert('Wrong password');</script>";
        }
    }else{
        echo "<script>alert('User not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(to right, #0e203a, #dcd8fc);
}

/* MAIN CONTAINER */
.container{
    width:800px;
    height:450px;
    background:#fff;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    display:flex;
    overflow:hidden;
}

/* LEFT PANEL */
.left{
    width:50%;
    background: linear-gradient(135deg, #5f9cff, #6a7dfc);
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:40px;
    border-top-right-radius:100px;
    border-bottom-right-radius:100px;
}

.left h2{
    margin-bottom:10px;
}

.left p{
    font-size:14px;
    opacity:0.8;
    margin-bottom:20px;
}

.left a{
    padding:10px 25px;
    border:1px solid white;
    color:white;
    text-decoration:none;
    border-radius:8px;
    transition:0.3s;
}

.left a:hover{
    background:white;
    color:#5f9cff;
}

/* RIGHT PANEL */
.right{
    width:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.form-box{
    width:100%;
}

.form-box h2{
    text-align:center;
    margin-bottom:20px;
}

.input-box{
    width:100%;
    margin-bottom:15px;
}

.input-box input{
    width:100%;
    padding:12px;
    border:none;
    background:#f1f1f1;
    border-radius:8px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#5f9cff;
    color:white;
    font-weight:500;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#4a7dfc;
}

.extra{
    text-align:center;
    margin-top:10px;
    font-size:13px;
}

.extra a{
    text-decoration:none;
    color:#5f9cff;
}
</style>
</head>

<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <h2>Hello, Welcome!</h2>
        <p>Don't have an account?</p>
        <a href="admin_register.php">Register</a>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="form-box">
            <h2>Login</h2>

            <form method="POST">
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button name="login">Login</button>
            </form>

            <div class="extra">
                <p>No account? <a href="user_register.php">Register</a></p>
            </div>
        </div>
    </div>

</div>

</body>
</html>