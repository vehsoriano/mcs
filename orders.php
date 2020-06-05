<?php 

session_start();

require 'php/db.php';
$session = $_SESSION['customerID'];

if(isset($session)) {
    
    $sql = "SELECT * FROM users WHERE customer_id=$session";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
                    
        while($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
        }
    }
}

?>

<?php include 'components/header.php'?>

<main class="orders">
    <div class="section-orders">
        <div class="container">
            <h1>My Dashboard</h1>
            <p>Hello, <?php echo $name?></p>
            <p>
                From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
            </p>

            <p>RECENT ORDERS</p>
            <table class="data-table" id="my-orders-table">
                <colgroup>
                    <col width="10%">
                    <col width="15%">
                    <col>
                </colgroup>
                <thead>
                    <tr class="first last">
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Information</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    // require 'php/db.php';
                    $sql = "SELECT * from orders where customer_id='$session'";
            
                    $result = mysqli_query($con, $sql);
                                        
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $order_id = $row['order_id'];
                            $time = $row['order_time'];
                            $prod_id = $row['product_id'];
                            $qty = $row['quantity'];
                            $total_price = $row['total_price'];
                    ?>

                    <tr class="first last odd">
                        <td><?php echo $order_id?></td>
                        <td><span class="nobr"><?php echo $time?></span></td>   
                        <td class="last">
                            <dl class="order-info">
                                <dt>Ship To</dt>
                                <dd><?php echo $name?></dd>

                                <?php 
                                // require 'php/db.php';
                                
                                $query = "SELECT * from products where product_id='$prod_id'";
                                $result2 = mysqli_query($con, $query);

                                if(mysqli_num_rows($result2) > 0) {
                                    while($row = mysqli_fetch_assoc($result2)) {
                                        $prod_code = $row['product_code'];
                                        $prod_name = $row['product_name'];
                                        $prod_price = $row['product_price'];
                                ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th align="left" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Product Name</th>
                                            <th align="left" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Sku</th>
                                            <th align="left" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Price</th>
                                            <th align="center" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Qty</th>
                                            <th align="right" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $prod_name?></td>
                                            <td><?php echo $prod_code?></td>
                                            <td><?php echo $prod_price?></td>
                                            <td><?php echo $qty?></td>
                                            <td><?php echo $total_price?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php 
                                   }
                                }
                                ?>
                                <dt>Order Total</dt>
                                <dd><span class="price">$AUD <?php echo $total_price?></span></dd>
                            </dl>
                        </td>
                    </tr>
                    
                    <?php
                        }
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'components/footer.php' ?>