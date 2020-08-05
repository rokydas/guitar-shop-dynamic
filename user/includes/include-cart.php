<?php
session_start();
$username = $_SESSION['username'];
if(isset($_SESSION['user_id'])){
    if(isset($_POST['cart-submit'])){
      require 'dbhandler.inc.php';

      if(isset($_GET['guitar_id'])){
          $guitar_id = $_GET['guitar_id'];
      }

      $query = "select * from cart ORDER BY RAND()";
      $query_run = mysqli_query($conn, $query);

      while($row = mysqli_fetch_array($query_run)){
          if ($row['username'] == $username && $row['guitar_id'] == $guitar_id) {
              // echo $row['username'], ' ', $row['guitar_id'], '<br>';
              header("Location: ../index.php?cart=AlreadyAdded");
              exit();
          }
      }

      $sql = "insert into cart (guitar_id, username, quantity) values (?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlError");
        exit();
      }
      else{
        // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET cart_number = cart_number + 1
        WHERE username = '$username' ";

        if ($conn->query($sql) == TRUE) {
          //do nothing
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $quantity = 1;
        mysqli_stmt_bind_param($stmt, "sss", $guitar_id, $username, $quantity);
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
        $cart_sql = "UPDATE users SET cart_number = cart_number - 1
        WHERE username = '$username' ";

        if ($conn->query($cart_sql) == TRUE) {
          //do nothing
        } else {
            echo "Error updating record: " . $conn->error;
        }
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
