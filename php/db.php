<?php

$servername="localhost";
$username="root";
$password="";
$db="mcs";

// Create Connection
$con=mysqli_connect($servername,$username,$password,$db);

// Check Connection
if(!$con) {
    die("Connection Failed:" . mysqli_connect_error());
} 
// else {
//     echo "Connected";
// }

// Create Database
// $sql = "CREATE DATABASE IF NOT EXISTS $db";

// if(mysqli_query($con, $sql)) {
//     $connect=mysqli_connect($servername,$username,$password,$db);

//     // 
//     $query="
//         CREATE TABLE IF NOT EXISTS products(
//             product_id INT(11) NOT NULL AUTO_INCREMENT,
//             product_name VARCHAR(25),
//             product_price FLOAT,
//             PRIMARY KEY(product_id)
//         );
//     ";

//     if(mysqli_query($connect, $query)) {
//         return $connect;
//     } else {
//         echo "Error while creating a table!";
//     }
// } else {
//     echo "Error while creating database!" . mysqli_error($con);
// }


?>