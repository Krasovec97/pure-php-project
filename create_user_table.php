<?php
include 'connection.php';
$sql = "CREATE TABLE job_applications( \n"
    . "            id INT NOT NULL AUTO_INCREMENT, \n"
    . "            full_name VARCHAR(100) NOT NULL, \n"
    . "            date_of_birth DATE, \n"
    . "            gender VARCHAR(5) NOT NULL, \n"
    . "            email VARCHAR(100) NOT NULL UNIQUE, \n"
    . "            cv_link VARCHAR(100) NOT NULL, \n"
    . "            PRIMARY KEY ( id ))";
// Database
if($conn->query($sql)===true){
    echo "Table was created successfully";
}
else{
    "Error: could not execute $sql. " . $conn->error;
}
$conn->close();