<?php

$servername = "localhost";
$username = "purephp";
$password = "secret";
$dbname = "pure_php_table";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}