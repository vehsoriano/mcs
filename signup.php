<?php include 'components/header.php';?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form 
                class="login100-form validate-form"
                action="includes/signup.inc.php"
                method="POST"
            >
                <!-- <span class="login100-form-title">
                    Register
                </span> -->

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input 
                        type="text" 
                        class="input100" 
                        id="firstName" 
                        name="firstName"
                        aria-describedby="firstName" 
                        placeholder="John"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input 
                        type="text" 
                        class="input100" 
                        id="lastName" 
                        name="lastName"
                        aria-describedby="lastName" 
                        placeholder="Doe"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input 
                        type="email" 
                        name="email" 
                        class="input100" 
                        id="email" 
                        placeholder="johndoe@gmail.com"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input 
                        type="text" 
                        name="mobile" 
                        class="input100" 
                        id="mobile" 
                        placeholder="045XXXXXXX"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input 
                        type="text" 
                        name="address" 
                        class="input100" 
                        id="address" 
                        placeholder="Unit 101/88 Blaxland Rd, Ryde NSW 2112"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-home" aria-hidden="true"></i>
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

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input 
                        type="password" 
                        name="confirmPassword" 
                        class="input100" 
                        id="confirmPassword" 
                        placeholder="Confirm Password"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button 
                        type="submit"
                        class="login100-form-btn"
                        name="signup-submit">
                        Create Account
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
                    <a class="txt2" href="index.php">
                        Login
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
    

<?php include 'components/footer.php';?>

