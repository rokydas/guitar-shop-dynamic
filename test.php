<?php

if (isset($_POST['final-update-submit'])) {
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
        header("Location: ../update-profile.php?error=emptyfields&username=".$username."&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../update-profile.php?error=InvalidMailUsername");
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../update-profile.php?error=InvalidMail&username=".$username);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../update-profile.php?error=InvalidUsername&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if($password !== $confirm_password){
        header("Location: ../update-profile.php?error=PasswordCheck&username=".$username."&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }

    else{

        $sql = "select username from users where username=?";
        $stmt_username = mysqli_stmt_init($conn);

        $duplicateEmail = "SELECT email FROM users WHERE email = ?";
        $stmt_email = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt_username, $sql) || !mysqli_stmt_prepare($stmt_email, $duplicateEmail)){
          header("Location: ../update-profile.php?error=sqlError");
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
              header("Location: ../update-profile.php?error=UsernameAlredyTaken&mail=".$email);
              exit();
          }
          else if($emailCheck > 0){
              header("Location: ../update-profile.php?error=EmailAlredyTaken&mail=".$email);
              exit();
          }
          else {
            $sql = "UPDATE users SET first_name = 'jhamelar' WHERE user_id=2";

            if ($conn->query($sql) === TRUE) {
                header("Location: ../profile.php?update=success");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }

          }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
  header("Location: ../index.php");
  exit();
}

?>
