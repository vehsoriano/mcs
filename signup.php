<?php include 'components/header.php';?>

<main class="signup">
    <div class="container">

        <?php
        
            if(isset($_GET['error'])) {
                if($_GET['error' == 'emptyfields']) {
                    echo '<p class="errorfields">There are some error in some fields.</p>'
                } 
            }
        
        ?>

        <form class="form-signup" action="includes/signup.inc.php" method="POST">
            <div class="form-group">
                <label for="firstName">First Name *</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="firstName" 
                    name="firstName"
                    aria-describedby="firstName" 
                    placeholder="John">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name *</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="lastName" 
                    name="lastName"
                    aria-describedby="lastName" 
                    placeholder="Doe">
            </div>
            <div class="form-group">
                <label for="email">Email address *</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email"
                    aria-describedby="email" 
                    placeholder="johndoe@gmail.com">
            </div>
            <div class="form-group">
                <label for="address">Address *</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="address" 
                    name="address"
                    aria-describedby="address" 
                    placeholder="Unit 101/88 Blaxland Rd, Ryde NSW 2112">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No. *</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="mobile" 
                    name="mobile"
                    aria-describedby="mobile" 
                    placeholder="045XXXXXXX">
            </div>
            <div class="form-group">
                <label for="password">Password *</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password"
                    placeholder="Password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password *</label>
                <input 
                    type="confirmPassword" 
                    class="form-control" 
                    id="confirmPassword" 
                    name="confirmPassword"
                    placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <button type="submit" name="signup-submit" class="btn btn-primary mr-auto px-4">Register</button>
            </div>
            <p class="text">
                Back to
                <a href="index.php">Login</a>
            </p>
        </form>
    </div>
<main>
    

<?php include 'components/footer.php';?>

