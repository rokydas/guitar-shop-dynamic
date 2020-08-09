<?php
    session_start();
    require 'dbhandler.inc.php';
    if(isset($_SESSION['username']) && isset($_POST['payment-submit'])){

    }
    else {
        header("Location: ../index.php");
        exit();
    }
?>
