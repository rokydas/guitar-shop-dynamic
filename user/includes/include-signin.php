<?php

if(isset($_POST['login-submit'])){
    require 'dbhandler.inc.php';


    $username_email = $_POST['username_email'];
    $password = $_POST['password'];
    if(empty($username_email) || empty($password)){
        header("Location: ../signin.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "select * from users where username=? or email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signin.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "ss", $username_email, $username_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
              // echo $password;
              // echo $row['password'];
              if($password == $row['password']){
                $passwordCheck = true;
              }
              else {
                $passwordCheck = false;
              }
              // $passwordCheck = password_verify($password, $row['password']);
              if ($passwordCheck == false) {
                header("Location: ../signin.php?error=WrongPassword");
                exit();
              }
              else if($passwordCheck == true){
                session_start();
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['profile_picture'] = $row['profile_picture'];
                $_SESSION['mobile_number'] = $row['mobile_number'];

                header("Location: ../index.php?login=success");
                exit();
              }
              else{
                header("Location: ../signin.php?error=WrongPassword");
                exit();
              }
            }
            else {
              header("Location: ../signin.php?error=noUser");
              exit();
            }

        }
    }

}
else {
    header("Location: ../signin.php");
    exit();
}


 ?>
