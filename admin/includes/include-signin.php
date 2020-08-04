<?php

if(isset($_POST['admin-login'])){
    require 'dbhandler.inc.php';


    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "select * from admin where username=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
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
                header("Location: ../index.php?error=WrongPassword");
                exit();
              }
              else if($passwordCheck == true){
                session_start();
                $_SESSION['admin-username'] = $row['username'];

                header("Location: ../home.php?login=success");
                exit();
              }
              else{
                header("Location: ../index.php?error=WrongPassword");
                exit();
              }
            }
            else {
              header("Location: ../index.php?error=noUser");
              exit();
            }

        }
    }

}
else {
    header("Location: index.php");
    exit();
}


 ?>
