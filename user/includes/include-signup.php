<?php

if (isset($_POST['signup-submit'])) {
    require 'dbhandler.inc.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $profile_picture = $_POST['profile_picture'];
    $mobile_number = $_POST['mobile_number'];

    if(empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($first_name) || empty($last_name) || empty($profile_picture) || empty($mobile_number)){
        header("Location: ../signup.php?error=emptyfields&username=".$username."&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=InvalidMailUsername");
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=InvalidMail&username=".$username);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=InvalidUsername&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if($password !== $confirm_password){
        header("Location: ../signup.php?error=PasswordCheck&username=".$username."&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }

    else{

        $sql = "select username from users where username=?";
        $stmt_username = mysqli_stmt_init($conn);

        $duplicateEmail = "SELECT email FROM users WHERE email = ?";
        $stmt_email = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt_username, $sql) || !mysqli_stmt_prepare($stmt_email, $duplicateEmail)){
          header("Location: ../signup.php?error=sqlError");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt_username, "s", $username);
          mysqli_stmt_execute($stmt_username);
          mysqli_stmt_store_result($stmt_username);
          $usernameCheck = mysqli_stmt_num_rows($stmt_username);

          mysqli_stmt_bind_param($stmt_email, "s", $email);
          mysqli_stmt_execute($stmt_email);
          mysqli_stmt_store_result($stmt_email);
          $emailCheck = mysqli_stmt_num_rows($stmt_email);

          if($usernameCheck > 0){
              header("Location: ../signup.php?error=UsernameAlredyTaken&mail=".$email);
              exit();
          }
          else if($emailCheck > 0){
              header("Location: ../signup.php?error=EmailAlredyTaken&mail=".$email);
              exit();
          }
          else {

              $sql = "insert into users (first_name, last_name, username, email, password, profile_picture, mobile_number) values (?, ?, ?, ?, ?, ?, ?)";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?error=sqlError");
                exit();
              }
              else{
                // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sssssss", $first_name, $last_name, $username, $email, $password, $profile_picture, $mobile_number);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                exit();
              }

          }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
  header("Location: ../signup.php");
  exit();
}

?>
