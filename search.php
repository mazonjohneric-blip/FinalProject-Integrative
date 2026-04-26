<?php
include "config.php";

if(isset($_GET['query'])){
    $search = $_GET['query'];

    $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo $row['product_name'] . "<br>";
    }
}
?>