<?php

session_start();

$total = 0;  
$count = 0;

    if(isset($_POST['checkout-btn'])) {

        require 'php/db.php';

        $cust_id = $_SESSION['customerID'];
        $cust_name = $_POST['orders_name'];
        $time = date('Y-m-d H:i:s');

        if(!empty($_SESSION["shopping_cart"]))  
        {    
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
                $prod_id = $values['product_id'];
                $qty = $values['item_quantity'];
                $price = $values['product_price'];
                $total = $qty * $price;
                $sql = "INSERT INTO ORDERS (customer_id, customer_name, product_id, quantity, total_price ,order_time) VALUES('$cust_id', '$cust_name', '$prod_id', '$qty', '$total', '$time')";

                if(mysqli_query($con, $sql)) {
                    echo 'Orders has been placed!';
                    // exit();
                } else {
                    echo 'Error' . mysqli_error($con);
                }
            }
            header("Location: cart.php?order=success");
            exit();
        }
    } 
?>


<?php include 'components/header.php'?>

<main class="cart">
    <div class="section-cart py-5">
        <div class="holder-left-pane">
            <div class="container">
                <div class="holder-items">
                    <h4><i class='fa fa-shopping-cart mr-2' aria-hidden='true'></i>Shopping Cart</h4>
                    <table class="table table-bordered">  
                        <tr>  
                            <th width="30%">SKU</th> 
                            <th width="20%">Item Name</th>  
                            <th width="10%">Quantity</th>  
                            <th width="20%">Price</th>  
                            <th width="15%">Total</th>  
                            <th width="5%">Action</th>  
                        </tr>  
                        <?php   
                        if(!empty($_SESSION["shopping_cart"]))  
                        {                              
                            foreach($_SESSION["shopping_cart"] as $keys => $values)  
                            {  
                            $count++;
                        ?>  
                        <tr>  
                            <td><?php echo $values["product_code"]; ?></td>  
                            <td><?php echo $values["product_name"]; ?></td>  
                            <td><?php echo $values["item_quantity"]; ?></td>  
                            <td>$ <?php echo $values["product_price"]; ?></td>  
                            <td>$ 
                                <?php 
                                    $qty = $values['item_quantity'];
                                    $price = $values['product_price'];
        
                                    echo number_format($qty * $price, 2); 
                                
                                ?>
                            </td>  
                            <td><a href="dashboard-user.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                        </tr>  
                        <?php  
                                $total = $total + ($values["item_quantity"] * $values["product_price"]);  
                            }  
                        ?>  
                        <tr>  
                            <td colspan="4" align="right">Total</td>  
                            <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                            <td></td>  
                        </tr>  
                        <?php  
                        }  
                        ?>  
                    </table>
                </div>
                <div class="holder-address">
                    <h4><i class='fa fa-truck mr-2' aria-hidden='true'></i>Delivery Address</h4>
                    <?php
                    
                    if(isset($_SESSION['customerID'])) {
                        $session = $_SESSION['customerID'];
                        
                        require 'php/db.php';
                        $sql = "SELECT * FROM users WHERE customer_id=$session";
                        $result = mysqli_query($con, $sql);
        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                                        
                            while($row = mysqli_fetch_assoc($result)) {
                                $address = $row['address'];
                                $name = $row['name'];
                                echo $address;
                            }
                        }
                    }
        
                    ?>
                </div>
            </div>
        </div>
        <!-- <?php echo $name?>
        <?php echo $count?> -->
        <div class="holder-right-pane">
            <div class="container">
                <h4><i class='fa fa-credit-card mr-2' aria-hidden='true'></i>Make Payment</h4>
                <div class="holder-details">
                    <div class="detail-item">
                        <p class="detail-title">SUBTOTAL</p>
                        <p class="detail-total">$AUD <?php echo number_format($total, 2); ?></p>
                    </div>
                    <div class="detail-item">
                        <p class="detail-title">TOTAL (incl. GST)</p>
                        <p class="detail-total">$AUD <?php echo number_format($total, 2); ?></p>
                    </div>
                </div>
                <form action="cart.php" method="POST">
                    <input type="hidden" name="orders_name" value=<?php echo $name?>>
                    <input type="hidden" name="orders_count" value=<?php echo $count?>>
                    <button type="submit" name="checkout-btn" class="btn-checkout">Place Order</button>
                </form>   
            </div>
        </div>
        
    </div>
</main>


<?php include 'components/footer.php'?>
