<?php
session_start();
include "db.php";

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart
if (isset($_GET['add'])) {
    $id = $_GET['add'];

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
    } else {
        $_SESSION['cart'][$id]++;
    }

    header("Location: user.php");
}

// Remove from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: user.php");
}

// Buy
if (isset($_GET['buy'])) {
    echo "<script>alert('Product Purchased!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Product List</title>

<style>
body {
    font-family: Arial;
    background: #f5f5f5;
    padding: 20px;
}

h2 {
    margin-bottom: 20px;
}

/* Products */
.container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    background: white;
    padding: 15px;
    width: 220px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

.card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
}

/* Buttons */
button {
    margin-top: 5px;
    padding: 7px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.buy {
    background: green;
    color: white;
}

.cart-btn {
    background: orange;
    color: white;
}

/* Cart */
.cart {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    padding: 15px;
    width: 250px;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}
</style>
</head>

<body>

<h2>User Product List</h2>

<!-- PRODUCTS -->
<div class="container">
<?php
$result = mysqli_query($conn, "SELECT * FROM products");

while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="card">
        <?php
$imagePath = "uploads/images/" . $row['image'];

if (!empty($row['image']) && file_exists($imagePath)) {
    echo "<img src='$imagePath' width='150'>";
} else {
    echo "<img src='https://via.placeholder.com/150' width='150'>";
}
?>

        <h3><?php echo $row['product_name']; ?></h3>
        <p>₱<?php echo $row['price']; ?></p>

        <a href="?buy=<?php echo $row['id']; ?>">
            <button class="buy">Buy</button>
        </a>

        <a href="?add=<?php echo $row['id']; ?>">
            <button class="cart-btn">Add to Cart</button>
        </a>
    </div>
<?php } ?>
</div>

<!-- CART -->
<div class="cart">
    <h3>🛒 Cart</h3>

<?php
$total = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {

        $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $product = mysqli_fetch_assoc($res);

        $subtotal = $product['price'] * $qty;
        $total += $subtotal;
?>
        <p>
            <?php echo $product['product_name']; ?> (x<?php echo $qty; ?>)
            <br>₱<?php echo $subtotal; ?>
            <br>
            <a href="?remove=<?php echo $id; ?>">Remove</a>
        </p>
        <hr>
<?php
    }
} else {
    echo "<p>Empty Cart</p>";
}
?>

    <h4>Total: ₱<?php echo $total; ?></h4>
</div>

</body>
</html>