<!DOCTYPE html>
<html>
<head>
    <title>Choose Registration</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, black, blue, black);
            color: white;
            text-align: center;
            margin-top: 100px;
        }

        .container {
            padding: 30px;
        }

        button {
            padding: 15px 30px;
            margin: 15px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .admin-btn {
            background-color: red;
            color: white;
        }

        .user-btn {
            background-color: white;
            color: black;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Choose Registration Type</h1>

        <!-- REGISTER ADMIN BUTTON -->
        <form action="admin_register.php" method="GET">
            <button class="admin-btn">Register Admin</button>
        </form>

        <!-- REGISTER USER BUTTON -->
        <form action="user_register.php" method="GET">
            <button class="user-btn">Register User</button>
        </form>
    </div>

</body>
</html>