<?php

    require '../php/db.php';

    $id = $_POST['product_id'];

    if(isset($_POST['product_id'])) {
        $sql = "SELECT * FROM products WHERE product_id=$id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        // echo json_encode($row);
        echo json_encode($row);
    }

?>