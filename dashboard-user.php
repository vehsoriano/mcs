<?php 
	
	require_once('php/db.php');
	session_start(); 

	if(isset($_POST["add-cart"]))  
 	{  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'product_id'            =>     $_GET["id"],  
                     'product_name'          =>     $_POST["hidden_name"],  
                     'product_code'          =>     $_POST["hidden_code"],    
                     'product_price'         =>     $_POST["hidden_price"],  
                     'item_quantity'         =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="dashboard-user.php"</script>';  
           }  
		}  
		else  
		{  
			$item_array = array(  
				'product_id'            =>     $_GET["id"],  
				'product_name'          =>     $_POST["hidden_name"],  
				'product_code'          =>     $_POST["hidden_code"],    
				'product_price'         =>     $_POST["hidden_price"],  
				'item_quantity'         =>     $_POST["quantity"]  
			);   
           $_SESSION["shopping_cart"][0] = $item_array;  
      	}  
 	}	  

	if(isset($_GET["action"]))  
	{  
		if($_GET["action"] == "delete")  
		{  
			foreach($_SESSION["shopping_cart"] as $keys => $values)  
			{  
					if($values["product_id"] == $_GET["id"])  
					{  
						unset($_SESSION["shopping_cart"][$keys]);    
						echo '<script>window.location="dashboard-user.php"</script>';  
					}  
			}  
		}  
	}
?>

<?php include 'components/header.php';?>

<main class="products">
	<div class="section-banner bg-dark text-light p-3">
		<div class="container">
			<div class="holder-banner">
				<h1 class="text-center">
					<i class="fa fa-shopping-cart mr-4" aria-hidden="true"></i>
					Welcome to Melbourne Convenient Store!
				</h1>
			</div>
		</div>
	</div>

	<div class="section-products">
		<div class="container">
			<div class="holder-products d-flex">

				<?php 
					
					require('php/db.php');

					$sql = 'SELECT * FROM products';

					$result = mysqli_query($con, $sql);

					if(mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo '
							<form method="post" action="dashboard-user.php?action=add&id='.$row['product_id'].'">
								<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="https://via.placeholder.com/80x60" alt="Card image cap">
									<div class="card-body">
										<h5 class="card-title">'. $row['product_name'] .'</h5>
										<p class="card-text"> SKU: '. $row['product_code'] . '</p>
										<p class="card-text"> $AUD '. $row['product_price'] . '.00</p>
										<p>Quantity: <input type="number" name="quantity" value="1" /></p>
										<input type="hidden" name="hidden_name" value='.$row['product_name'].' />
										<input type="hidden" name="hidden_code" value='.$row['product_code'].' />
										<input type="hidden" name="hidden_price" value='.$row['product_price'].' />
										<button type="submit" name="add-cart" class="btn btn-primary">Add to Cart</a>
									</div>
								</div>
							</form>
							';			
						}
					}
					
				?>
			</div>
		</div>
	</div>

	
	<!-- <div class="section-form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-8 col-md-10 text-center">
					<div class="my-5">
					<h2>MCS Inventory System</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<a href="inventory.php" class="team">
						<div class="team-avatar inventory">
							<p class="text-center title">Inventory</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a href="products.php" class="team">
						<div class="team-avatar products">
							<p class="text-center title">Add Products</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div> -->
	
</main>


<?php include 'components/footer.php';?>

