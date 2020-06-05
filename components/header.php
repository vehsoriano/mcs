<?php 

// session_start();

$count = 0;

if(!empty($_SESSION["shopping_cart"])){ 
	foreach($_SESSION["shopping_cart"] as $keys => $values)  
	{  
		$count++;
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" />		
	<title>Melbourne Convenient Store</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="styles/main.css?v=<?php echo time(); ?>" media="all" rel="stylesheet"  type="text/css"/>
</head>
<body>

<header>
    <?php

	if(isset($_SESSION['customerID'])) {
		$session = $_SESSION['customerID'];
		
		require 'php/db.php';
		$sql = "SELECT * FROM users WHERE customer_id=$session";
		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
						
			while($row = mysqli_fetch_assoc($result)) {

				if($row['role'] == 'user') {
					if($_SERVER['REQUEST_URI'] === '/assignment/dashboard.php' || $_SERVER['REQUEST_URI'] === '/assignment/index.php') {
						header("Location: ../assignment/dashboard-user.php");
						exit(); 
					}
				} else if ($row['role'] == 'admin') {
					if($_SERVER['REQUEST_URI'] === '/assignment/dashboard-user.php' || $_SERVER['REQUEST_URI'] === '/assignment/index.php') {
						header("Location: ../assignment/dashboard.php");
						exit(); 
					}
				}

				echo '  <nav class="navbar navbar-expand-lg navbar-light bg-light">';

				if($row['role'] == 'admin') {
					echo '     <a class="navbar-brand" href="dashboard.php">MCS</a>';
				} else {
					echo '     <a class="navbar-brand" href="dashboard-user.php">MCS</a>';
				}

				echo '       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
				echo '            <span class="navbar-toggler-icon"></span>';
				echo '        </button>';
				echo '        <div class="collapse navbar-collapse" id="navbarSupportedContent">';
				
				if($row['role'] == 'user') {
					echo '            
					<ul class="navbar-nav mr-auto">   
						<li class="nav-item active">
							<a class="nav-link" href="dashboard-user.php">Shop <span class="sr-only">(current)</span></a>
						</li>       
						<li class="nav-item">
							<a class="nav-link" href="profile.php">Profile</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="orders.php">Orders</a>
						</li>
					</ul>';
				}

				if($row['role'] == 'admin') {
					echo "<span class='mr-2 ml-auto'>Howdy Admin, " . $row["name"] . "! </span>";
				} else {
					echo "<span class='mr-2'>Hi, " . $row["name"] . "! </span>";	
					echo "<a class='holder-cart-link' href='cart.php'>
					<i class='fa fa-shopping-cart mr-4' aria-hidden='true'></i>
					<span class='holder-cart-number'>". $count ."</span>
					</a>";
				}

				if(isset($_SESSION['customerID'])) {
					echo '<form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="POST"/>
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout-submit">Logout</button>
						</form>';
				} else {
					echo '<form class="form-inline my-2 my-lg-0>
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
						</form>';
				}
			
				echo '  </nav>';

			}
			echo '        </div>';
		} else {
				echo "0 results";
		}
	} else {

		if($_SERVER['REQUEST_URI'] === '/assignment/dashboard-user.php' || $_SERVER['REQUEST_URI'] === '/assignment/dashboard.php') {
			header("Location: ../assignment/index.php?error=nouser");
            exit(); 
		}
	}
	

    
             
                


    ?>
</header>