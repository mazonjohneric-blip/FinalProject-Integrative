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

<body>

<h2 style="text-align:center; color:#7dd3fc;">Order Status</h2>

<style>
body {
    font-family: Arial;
    background: #0f172a;
    color: white;
}

/* CARD */
.status-card {
    max-width: 500px;
    margin: 40px auto;
    background: #e5e7eb;
    color: black;
    padding: 20px;
    border-radius: 12px;
}

/* TABLE */
.status-table {
    width: 100%;
    border-collapse: collapse;
}

.status-table td {
    padding: 12px;
    border-bottom: 1px solid #ccc;
}

/* STATUS BADGE */
.badge {
    padding: 6px 12px;
    border-radius: 6px;
    color: white;
    font-weight: bold;
}

.completed { background: green; }
.pending { background: orange; }

/* BACK BUTTON */
.back-btn {
    display: inline-block;
    margin-top: 15px;
    padding: 8px 15px;
    background: #3b82f6;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}
</style>

<div class="status-card">

    <table class="status-table">
        <?php for ($i = 0; $i < count($steps); $i++) { ?>
        <tr>
            <td><?php echo $steps[$i]; ?></td>
            <td>
                <?php if ($i < $current_step) { ?>
                    <span class="badge completed">Completed</span>
                <?php } else { ?>
                    <span class="badge pending">Pending</span>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>

    <a href="my_purchases.php" class="back-btn">← Back to Purchases</a>

</div>

</html>