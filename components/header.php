<?php 

session_start();

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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">MCS</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<!-- <li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li> -->
		</ul>

		<?php
			if(isset($_SESSION['customerID'])) {
				echo '<form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="POST"/>
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout-submit">Logout</button>
					</form>';
			} else {
				echo '<form class="form-inline my-2 my-lg-0>
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
					</form>';
			}
		?>

		
	</div>
	</nav>
</header>