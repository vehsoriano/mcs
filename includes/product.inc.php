<?php


if(isset($_POST['add-product'])) {
    
    require '../php/db.php';

    $code = $_POST['product_code'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $prod_code = "SELECT product_code FROM products WHERE product_code=?";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $prod_code)) {
        header("Location: ../products.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $code);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            header("Location: ../products.php?error=codealreadyexists!");
            exit(); 
        } else {

            $sql = "INSERT INTO products (product_code, product_name, product_price, product_quantity) VALUES('$code', '$name', '$price', '$quantity')";
            // $sql = "INSERT INTO products (product_code, product_name, product_price, product_quantity) VALUES('CXZVB11111', 'Suntour E bike', '2000', '10')";

            if(mysqli_query($con, $sql)) {
                echo 'Products added!';
                header("Location: ../products.php?success");
                exit();
            } else {
                echo 'Error' . mysqli_error($con);
                header("Location: ../products.php?sqlerror=emptyfieldscode".$code. 'name' .$name. 'price' .$price. 'qty' .$quantity);
                // exit();
            }
        }
    }
}

if(isset($_POST['update-product'])) {
    require '../php/db.php';
    $id = $_POST['product_id'];
    // $code = $_POST['product_code'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $qty = $_POST['quantity'];

    // $sql = "UPDATE products SET product_code=$code, product_name=$name, product_price=$price, product_quantity=$qty WHERE product_id=$id";

    $sql = "UPDATE products SET product_name='$name', product_price='$price', product_quantity='$qty' WHERE product_id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../products.php?update=success-id".$id.'-'.$code.'-'.$name.'-'.$price.'-'.$qty);
        exit();
    } else {
        echo "Error updating record: " . $con->error;
    }
}




?>