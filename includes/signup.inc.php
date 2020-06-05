<?php 

if(isset($_POST['signup-submit'])) {
    require '../php/db.php';

    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $role = "user";

    if (empty($first_name) || empty($last_name) || empty($email) || empty($mobile) || empty($address) || empty($password)  || empty($confirm_password)) {
        header("Location: ../signup.php?error=emptyfields&firstName".$first_name."&lastName".$last_name);
        exit();
    } 

    else if ($password !== $confirm_password) {
        header("Location: ../signup.php?error=passwordcheckfirstName".$first_name);
        exit();
    }

    else {
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=emailalreadyexist");
                exit(); 
            }
            
            else {
                $sql = "INSERT INTO users (name, address, email, mobile_no, role, password) VALUES (?, ? ,?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($con);

                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=invalidsqlerror");
                    exit();
                } 

                else {

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $address, $email, $mobile, $role, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    // mysqli_stmt_store_result($stmt);
                    header("Location: ../login.php?signup=success");
                    exit();
                    
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    // else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     header("Location: ../signup.php?error=invalidemail&firstName".$first_name."&lastName".$last_name);
    //     exit();  
    // } 
    
    // else if(!preg_match("/^[a-zA-Z]*$/"), $first_name) {
    //     header("Location: ../signup.php?error=invalidmail&".$first_name."&lastName".$last_name);
    //     exit(); 
    // }
} else {
    header("Location: ../signup.php");
    exit();
}

?>