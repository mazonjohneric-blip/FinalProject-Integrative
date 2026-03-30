<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "login_system";

// connect
$conn = new mysqli($host, $user, $pass);

// create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $db";
$conn->query($sql);

// select db
$conn->select_db($db);

// create table if not exists
$table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$conn->query($table);
?>