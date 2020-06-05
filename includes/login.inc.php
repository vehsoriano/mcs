<?php 

if(isset($_POST['login-submit'])) {
    require '../php/db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {
                $passwordValidate = password_verify($password, $row['password']);

                if($passwordValidate ==  false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit(); 
                }
                else if($passwordValidate == true) {
                    session_start();
                    $_SESSION['customerID'] = $row['customer_id'];
                    $_SESSION['name'] = $row['name'];
                    if($row['role'] == 'admin') {
                        header("Location: ../dashboard.php?login=success");
                        exit();
                    } else {
                        header("Location: ../dashboard-user.php?login=success");
                        exit();
                    }
                } 
                else {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            } 
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}

?>