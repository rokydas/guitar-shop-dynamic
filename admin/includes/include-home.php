<?php
session_start();
require 'dbhandler.inc.php';

//Making Unavailable
if(isset($_SESSION['admin-username']) && isset($_POST['unavailable-submit'])){
  echo "jhamela";
    if($_GET['guitar_id']){
        $guitar_id = $_GET['guitar_id'];
    }
    echo $guitar_id;
    $query = "update guitar set presence = FALSE where guitar_id =".$guitar_id;
    if ($conn->query($query) === TRUE) {
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
        header("Location: ../home.php?success=available");
        exit();
    } else {
        header("Location: ../home.php?error=available");
        exit();
    }
}

?>
