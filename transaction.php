<?php
include 'db.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM purchases WHERE id='$id'");
$row = mysqli_fetch_assoc($query);
?>

<h2>Transaction Details</h2>

<p>Product: <?php echo $row['product_name']; ?></p>
<p>Price: ₱<?php echo $row['price']; ?></p>
<p>Quantity: <?php echo $row['quantity']; ?></p>
<p>Total: ₱<?php echo $row['total_price']; ?></p>
<p>Date: <?php echo $row['created_at']; ?></p>