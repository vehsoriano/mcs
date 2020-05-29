<?php 

	require_once('php/db.php');

?>

<?php include 'components/header.php';?>

<main class="main">
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

	<div class="section-form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-8 col-md-10 text-center">
					<div class="my-5">
					<h2>MCS Inventory System</h2>
					<!-- <p></p> -->
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
	</div>
	
</main>


<?php include 'components/footer.php';?>

