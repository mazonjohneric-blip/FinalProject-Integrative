<?php
include 'db.php';

$result = mysqli_query($conn, "
   SELECT p.*, pr.product_name, pr.price, pr.image 
FROM purchases p
JOIN products pr ON p.product_id = pr.id
");
?>



<!DOCTYPE html>
<html>
<head>
    <title>My Purchases</title>

     

    <style>
        body {
            font-family: Arial;
            background: #0f172a;
            color: white;
        }

        a {
            text-align: right;
            color: #f8f8f8;
            font-size: 30px;
        }


        h2 {
            text-align: center;
            color: #7dd3fc;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            padding: 20px;
        }

        .card {
            background: #e5e7eb;
            color: black;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }

        .card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .price {
            color: #16a34a;
            font-weight: bold;
        }

    </style>
</head>
<body>

<h2>My Purchases</h2>

<a href="user.php">
    <button style="
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 10px 15px;
        background-color: #f1eaea;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    ">
        Home
    </button>
</a>

<div class="container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>
    <div class="card">
    <img src="<?php echo $row['image']; ?>">
    <h4><?php echo $row['product_name']; ?></h4>
    <p class="price">₱<?php echo $row['price']; ?></p>

    <form method="GET" action="product_details.php">
        <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
        <button type="submit">Details</button>
    </form>
</div>
<?php } ?>

</div>

</body>
</html>