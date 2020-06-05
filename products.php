<?php 

session_start();

?>


<?php include 'components/header.php';?>

<div class="section-table">
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Products
        </button>
        <table class="mt-5">
            <tr>
                <th>Product Code</th>
                <th>Product Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>

            <?php

            require 'php/db.php';

            $sql = 'SELECT * from products';
            
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['product_code'] .  "</td>";
                    echo "<td> 
                        <img class='product-img' src='images/placeholder-image.png'/> 
                    </td>";
                    echo "<td>" . $row['product_name'] .  "</td>";
                    echo "<td>" . $row['product_price'] .  "</td>";
                    echo "<td>" . $row['product_quantity'] .  "</td>";
                    echo "<td>";
                    echo "<form action='includes/product.inc.php' method='POST'>";
                        echo '<input type="text" id="product_id" name="product_id" value='.$row['product_id'].' hidden>';

                        echo '<button type="button" id="btn-edit" class="btn btn-primary mr-1" data-toggle="modal" data-target="#exampleModal">
                            Edit
                        </button>';

                        echo '<button type="button" id="btn-delete" class="btn btn-danger">
                            Delete
                        </button>';
                    
                    echo "</td>";
                    echo "</tr>";
                }
            }

            ?>

            <!-- <tr>
                <td>CXZV120000</td>
                <td>Suntour Ebike</td>
                <td>$AUD 2500.00</td>
                <td>11</td>
            </tr> -->
        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/product.inc.php" method="POST">
                    <!-- <input type="hidden" name="size" value="1000000" />
                    <div class="form-group">
                        <label for="file">Product Image *</label>
                        <input 
                            type="file" 
                            class="form-control"
                            name="file"
                        >   
                    </div> -->

                    <div class="form-group">
                        <label for="product_code">Product Code *</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="product_code" 
                            name="product_code"
                            aria-describedby="product_code" 
                            placeholder="CXZV120000"
                            maxlength="10"
                        >
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product Name *</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="product_name" 
                            name="product_name"
                            aria-describedby="product_name" 
                            placeholder="Sun tour Ebike"
                        >
                    </div> 
                    <div class="form-group">
                        <label for="price">Price *</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="price" 
                            name="price"
                            aria-describedby="price" 
                            placeholder="1499"
                        >
                    </div> 
                    <div class="form-group">
                        <label for="quantity">Quantity(Stocks) *</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="quantity" 
                            name="quantity"
                            aria-describedby="quantity" 
                            placeholder="100"
                        >
                    </div> 
                    
                    <button type="submit" id="add-product" name="add-product" class="btn btn-primary mr-auto px-4">Add Product</button>
                    <button type="submit" id="update-product" name="update-product" class="btn btn-primary mr-auto px-4">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Add</button> -->
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php';?>
