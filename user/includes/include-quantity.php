<?php
session_start();
require 'dbhandler.inc.php';

$user_id = $_SESSION['user_id'];

if(isset($_GET['quantity'])){
    $quantity = $_GET['quantity'];
}

if(isset($_GET['guitar_id'])){
    $guitar_id = $_GET['guitar_id'];
}

// echo $quantity;
// echo $guitar_id;

if(isset($_SESSION['user_id']) && isset($_POST['plus-submit'])){
    $quantity = $quantity + 1;
    $query = "update cart set quantity = quantity + 1 where user_id = '$user_id' and guitar_id = '$guitar_id' ";
    if ($conn->query($query) === TRUE) {
      $sql = "UPDATE users SET cart_number = cart_number + 1
      WHERE user_id = '$user_id' ";

      if ($conn->query($sql) == TRUE) {
        //do nothing
      } else {
          echo "Error updating record: " . $conn->error;
      }
      header("Location: ../cart.php");
      exit(); // it is to exist from this page and not to run below codes.
    } else {
      echo "Error updating record: " . $conn->error;
    }
}

else if(isset($_SESSION['user_id']) && isset($_POST['minus-submit'])){
    if ($quantity > 1) {
        $quantity = $quantity - 1;
        $query = "update cart set quantity = quantity - 1 where user_id = '$user_id' and guitar_id = '$guitar_id' ";
        if ($conn->query($query) === TRUE) {
          $sql = "UPDATE users SET cart_number = cart_number - 1
          WHERE user_id = '$user_id' ";

          if ($conn->query($sql) == TRUE) {
            //do nothing
          } else {
              echo "Error updating record: " . $conn->error;
          }
          header("Location: ../cart.php");
          exit(); // it is to exist from this page and not to run below codes.
        } else {
          echo "Error updating record: " . $conn->error;
        }
    }
    else {
        header("Location: ../cart.php");
        exit(); // it is to exist from this page and not to run below codes.
    }
}

else {
    header("Location: ../index.php");
    exit(); // it is to exist from this page and not to run below codes.
}

 ?>
