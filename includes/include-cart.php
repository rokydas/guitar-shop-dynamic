<?php
session_start();
if(isset($_SESSION['user_id'])){
    if(isset($_POST['cart-submit'])){
      require 'dbhandler.inc.php';

      if(isset($_GET['guitar_id'])){
          $guitar_id = $_GET['guitar_id'];
      }
      $username = $_SESSION['username'];

      $sql = "insert into cart (guitar_id, username) values (?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlError");
        exit();
      }
      else{
        // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ss", $guitar_id, $username);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php?cart=Added");
        exit();
      }
    }
    else if(isset($_POST['cart-remove-submit'])){
      require 'dbhandler.inc.php';

      if(isset($_GET['guitar_id'])){
          $guitar_id = $_GET['guitar_id'];
      }

      $sql = "delete from cart where guitar_id = ".$guitar_id;
      if ($conn->query($sql) === TRUE) {
        header("Location: ../cart.php?cart=deleted");
        exit();
      }
      else {
          echo "Error deleting record: " . $conn->error;
      }
    }

    else {
        header("Location: ../index.php");
        exit();
    }
}
else {
    header("Location: ../index.php?cart=SignInRequired");
    exit();
}


 ?>
