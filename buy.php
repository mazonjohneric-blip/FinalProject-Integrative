<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'] ?? 1;

if(isset($_POST['product_id'])){

    $product_id = $_POST['product_id'];

    // kunin product info sa products table
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'");
    $product = mysqli_fetch_assoc($result);

    if(!$product){
        die("Product not found");
    }

    $name = $product['product_name'];
    $price = $product['price'];
    $quantity = 1;
    $total = $price * $quantity;

    // INSERT SA purchases
    $insert = mysqli_query($conn, "INSERT INTO purchases 
    (user_id, product_id, product_name, price, quantity, total_price) 
    VALUES 
    ('$user_id', '$product_id', '$name', '$price', '$quantity', '$total')");

    if(!$insert){
        die("ERROR: " . mysqli_error($conn));
    }

    // redirect
    header("Location: my_purchases.php");
    exit();

    var_dump($product);
exit();
}
?>