<?php
include "config.php";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password)
            VALUES ('$username','$password')";

    if($conn->query($sql)){
        echo "<script>alert('Registered Successfully'); window.location='admin_login.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
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

/* MAIN BOX */
.container{
    width:800px;
    height:450px;
    background:#fff;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    display:flex;
    overflow:hidden;
}

/* LEFT SIDE (FORM) */
.left{
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
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#4a7dfc;
}

/* RIGHT SIDE (WELCOME) */
.right{
    width:50%;
    background: linear-gradient(135deg, #5f9cff, #6a7dfc);
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:40px;
    border-top-left-radius:100px;
    border-bottom-left-radius:100px;
}

.right h2{
    margin-bottom:10px;
}

.right p{
    font-size:14px;
    opacity:0.8;
    margin-bottom:20px;
}

.right a{
    padding:10px 25px;
    border:1px solid white;
    color:white;
    text-decoration:none;
    border-radius:8px;
    transition:0.3s;
}

.right a:hover{
    background:white;
    color:#5f9cff;
}

.extra{
    text-align:center;
    margin-top:10px;
    font-size:13px;
}
</style>
</head>

<body>

<div class="container">

    <!-- LEFT (REGISTER FORM) -->
    <div class="left">
        <div class="form-box">
            <h2>Registration</h2>

            <form method="POST">
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button name="register">Register</button>
            </form>

            <div class="extra">
                <p>Already have an account?</p>
            </div>
        </div>
    </div>

    <!-- RIGHT (WELCOME BACK) -->
    <div class="right">
        <h2>Welcome Back!</h2>
        <p>Already have an account?</p>
        <a href="admin_login.php">Login</a>
    </div>

</div>

</body>
</html>