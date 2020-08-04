<?php

if(isset($_POST['logout-submit'])){
    session_start();
    session_unset(); //deletes all variables of session
    session_destroy(); // delete whole session
    header('Location: ../index.php?logout=success');
}


?>
