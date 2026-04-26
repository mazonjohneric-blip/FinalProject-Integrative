<?php
session_start();
include "db.php";

// INIT
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['purchases'])) {
    $_SESSION['purchases'] = [];
}

// REMOVE ITEM
if (isset($_GET['remove'])) {
    $id = (int)$_GET['remove'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }

    header("Location: cart.php");
    exit();
}

// CHECKOUT PER ITEM
if (isset($_GET['checkout'])) {
    $id = (int)$_GET['checkout'];

    if (isset($_SESSION['cart'][$id])) {

        $qty = $_SESSION['cart'][$id];

        // ADD TO PURCHASES (IMPORTANT)
        if (isset($_SESSION['purchases'][$id])) {
            $_SESSION['purchases'][$id] += $qty;
        } else {
            $_SESSION['purchases'][$id] = $qty;
        }

        // REMOVE FROM CART
        unset($_SESSION['cart'][$id]);
    }

    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <style>
        body {
            font-family: Arial;
            background: #0f172a;
            color: white;
        }
        .container {
            width: 70%;
            margin: auto;
        }
        .item {
            background: #1e293b;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
        }
        .btn {
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        .remove { background: red; }
        .checkout { background: green; margin-left: 10px; }
    </style>
</head>
<body>

<h1 style="text-align:center;">🛒 Your Cart</h1>

<div class="container">

<?php
if (empty($_SESSION['cart'])) {
    echo "<p>Empty cart</p>";
} else {

    foreach ($_SESSION['cart'] as $id => $qty) {

        $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $row = mysqli_fetch_assoc($res);

        if (!$row) continue;
?>

    <div class="item">
        <h3><?php echo $row['product_name']; ?></h3>
        <p>₱<?php echo $row['price']; ?></p>
        <p>Qty: <?php echo $qty; ?></p>

        <a href="cart.php?remove=<?php echo $id; ?>" class="btn remove">Remove</a>
        <a href="cart.php?checkout=<?php echo $id; ?>" class="btn checkout">Checkout</a>
    </div>

<?php
    }
}
?>

</div>

</body>
</html>