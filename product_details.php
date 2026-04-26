<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);
?>
<?php
$steps = [
    "Order Placed",
    "Order Confirmed",
    "Preparing Items",
    "Shipped",
    "Out for Delivery",
    "Delivered"
];

// random step (1 to 6)
$current_step = rand(1, count($steps));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <style>
        body {
            font-family: Arial;
            background: #0f172a;
            color: white;
            text-align: center;
        }

        .card {
            background: #e5e7eb;
            color: black;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 50px auto;
        }

        img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .price {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">
    <img src="<?php echo $row['image']; ?>">
    <h2><?php echo $row['product_name']; ?></h2>
    <p class="price">₱<?php echo $row['price']; ?></p>

    <p>Description: <?php echo $row['description'] ?? 'No description available'; ?></p>
</div>

<h3 style="margin-top:20px;">Order Status</h3>

<div class="timeline">
<?php for ($i = 0; $i < count($steps); $i++) { ?>
    
    <div class="step <?php echo ($i < $current_step) ? 'active' : ''; ?>">
        <div class="circle"></div>
        <div class="content">
            <h4><?php echo ($i+1) . ". " . $steps[$i]; ?></h4>
            <p>
                <?php
                if ($i < $current_step) {
                    echo "Completed";
                } else {
                    echo "Pending";
                }
                ?>
            </p>
        </div>
    </div>

<?php } ?>
</div>

</body>
</html>