<?php include 'components/header.php';?>

<main class="section-login">
    <div class="container">
        <form class="form-login" action="includes/login.inc.php" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
				<input 
					type="email" 
					name="email" 
					class="form-control" 
					id="email" 
					aria-describedby="emailHelp" 
					placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
				<input 
					type="password" 
					name="password" 
					class="form-control" 
					id="password" 
					placeholder="Password">
            </div>
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <p>
                Don't have an account?
                <a href="signup.php">Register</a>
            </p>

            <button type="submit" name="login-submit" class="btn btn-primary">Login</button>
        </form>
    </div>
<main>
    

<?php include 'components/footer.php';?>

