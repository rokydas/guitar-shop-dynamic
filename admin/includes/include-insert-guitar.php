<?php

if (isset($_POST['insert-guitar-submit'])) {
    require 'dbhandler.inc.php';

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $iamge = $_POST['image'];

    if(empty($brand) || empty($model) || empty($price) || empty($iamge)){
        header("Location: ../insert-guitar.php?error=emptyfields");
        exit(); // it is to exist from this page and not to run below codes.
    }

    else if (!is_numeric($price)) {
        header("Location: ../insert-guitar.php?error=priceError");
        exit(); // it is to exist from this page and not to run below codes.
    }

    else{

      $sql = "insert into guitar (brand, model, image, price) values (?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../insert-guitar.php?error=sqlError");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "ssss", $brand, $model, $iamge, $price);
        mysqli_stmt_execute($stmt);
        header("Location: ../insert-guitar.php?insert=success");
        exit();
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);

      }
}
else {
  header("Location: ../home.php");
  exit();
}

?>
