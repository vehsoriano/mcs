<?php include 'components/header.php';?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form 
                class="login100-form validate-form" 
                action="includes/login.inc.php"
                method="POST"	
            >
                <span class="login100-form-title text-right">
                    <!-- Login -->
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input 
                        type="email" 
                        name="email" 
                        class="input100" 
                        id="email" 
                        aria-describedby="emailHelp" 
                        placeholder="Enter email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input 
                        type="password" 
                        name="password" 
                        class="input100" 
                        id="password" 
                        placeholder="Password"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button 
                        class="login100-form-btn"
                        name="login-submit">
                        Login
                    </button>
                </div>
<!-- 
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div> -->

                <div class="text-center p-t-136">
                    <a class="txt2" href="signup.php">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'components/footer.php';?>

