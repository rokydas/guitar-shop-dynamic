<?php
session_start();
require 'dbhandler.inc.php';

//Making Unavailable
if(isset($_SESSION['admin-username']) && isset($_POST['unavailable-submit'])){
    if($_GET['guitar_id']){
        $guitar_id = $_GET['guitar_id'];
    }
    // echo $guitar_id;
    $query = "update guitar set presence = FALSE where guitar_id =".$guitar_id;
    if ($conn->query($query) === TRUE) {

        $cart_query = "select * from cart where guitar_id= '$guitar_id'";
        $cart_query_run = mysqli_query($conn, $cart_query);

        while($row1 = mysqli_fetch_array($cart_query_run)){
            $username = $row1['username'];
            $user_query = "update users set cart_number = cart_number - 1 where username = '$username' ";
            if ($conn->query($user_query) === TRUE) {
                echo "string";
            } else {
              echo "Error updating record: " . $conn->error;
            }
        }
        header("Location: ../home.php?success=unavailable");
        exit();
    } else {
        header("Location: ../home.php?error=unavailable");
        exit();
    }
}

//Making Available
if(isset($_SESSION['admin-username']) && isset($_POST['available-submit'])){
    if($_GET['guitar_id']){
        $guitar_id = $_GET['guitar_id'];
    }
    $query = "update guitar set presence = TRUE where guitar_id =".$guitar_id;
    if ($conn->query($query) === TRUE) {
        $cart_query = "select * from cart where guitar_id= '$guitar_id'";
        $cart_query_run = mysqli_query($conn, $cart_query);

        while($row1 = mysqli_fetch_array($cart_query_run)){
            $username = $row1['username'];
            $user_query = "update users set cart_number = cart_number + 1 where username = '$username' ";
            if ($conn->query($user_query) === TRUE) {
                echo "string";
            } else {
              echo "Error updating record: " . $conn->error;
            }
        }
        header("Location: ../home.php?success=available");
        exit();
    } else {
        header("Location: ../home.php?error=available");
        exit();
    }
}

?>
