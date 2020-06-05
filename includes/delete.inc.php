<?php

    require '../php/db.php';

    $id = $_POST['product_id'];
    if(isset($_POST['product_id'])) {
        // sql to delete a record
        $sql = "DELETE FROM products WHERE product_id=$id";
        mysqli_query($con, $sql);
    }

?>

