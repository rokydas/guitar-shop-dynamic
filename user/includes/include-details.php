<?php
    session_start();
    if (isset($_POST['review-button']) && isset($_SESSION['user_id'])){
        require 'dbhandler.inc.php';

        $review = $_POST['review'];
        $user_id = $_SESSION['user_id'];
        $guitar_id = $_GET['guitar_id'];

        if(empty($review)){
          header("Location: ../details.php?guitar_id=$guitar_id&insert=nothingToInsert");
          exit(); // it is to exist from this page and not to run below codes.
        }
        else{
          $sql = "insert into review (guitar_id, user_id, review_text) values (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../details.php?guitar_id=$guitar_id&insert=sqlError");
            exit();
          }
          else{
            mysqli_stmt_bind_param($stmt, "sss", $guitar_id, $user_id, $review);
            mysqli_stmt_execute($stmt);
            header("Location: ../details.php?guitar_id=$guitar_id&insert=success");
            exit(); // it is to exist from this page and not to run below codes.
          }
          mysqli_stmt_close($stmt);
          mysqli_close($conn);

          }

    }
    else {
        header("Location: ../index.php");
        exit(); // it is to exist from this page and not to run below codes.
    }


?>
