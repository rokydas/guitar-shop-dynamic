<?php
  session_start();
  require 'includes/dbhandler.inc.php';
  if(isset($_SESSION['user_id'])){
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/details.css">
    <title><?php echo $_SESSION['first_name'], ' ', $_SESSION['last_name'] ?></title>
</head>

<body>
    <header>
        <section class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#"><img src="../images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active navbar-active" href="index.php">Home <span
                                class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active" href="profile.php"><?php echo $_SESSION['first_name'], ' ', $_SESSION['last_name'] ?></a>
                        <a class="nav-item nav-link active" href="cart.php">Cart</a>
                        <form action='includes/include-logout.php' method='post'>
                          <button type='submit' name='logout-submit' class='nav-item nav-link active btn btn-danger' href=''>Log Out</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="heading">
                <h1>Dream Guitarist</h1>
                <h2>Welcome to our shop</h2>
                <h3>Find out your guitar in our website</h3>
            </div>
        </section>
      </header>
        <?php

        if(isset($_GET['guitar_id'])){
            $guitar_id = $_GET['guitar_id'];
        }

        $query = "select * from guitar";
        $query_run = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($query_run)){
            $id = $row['guitar_id'];

            if($guitar_id == $id){

          ?>

        <section class="container guitar">
            <h3 class="text-center" style="font-family: 'Pacifico', cursive;">Product Details</h3>
            <hr class="hori-row">

            <div class="d-flex justify-content-around">
              <div class="guitar-pic">
                  <img width="500px" class="img-fluid" src="../images/guitars/<?php echo $row['image']; ?>" alt="">
              </div>

              <div class="guitar-description">
                  <h3>Brand name: <?php echo $row['brand']; ?></h3>
                  <h3>Model name: <?php echo $row['model']; ?> </h3>
                  <h3>Product ID: <?php echo $row['guitar_id']; ?> </h3>
                  <h3>Price: <?php echo $row['price']; ?></h3>
              </div>
            </div>

            <div class="review">
              <div class="input-comment">
                <h3 style="color: black">Submit your review about this product</h3>
                <textarea rows="4" cols="50" name="comment" form="usrform"></textarea><br>
                <button class="custom-button" type="button" name="button">Submit</button>
              </div>
              <div class="comment">
                <h3>Roky Das</h3>
                <p>Product ta valo lagse amar. erokom product aro cai amader apu vhai er kase.</p>
              </div>
              <div class="comment">
                <h3>Apu Vhai</h3>
                <p>Thik Ase vhai. apnar jonno erokom product ana hobe aro.</p>
              </div>

            </div>


        </section>

      <?php } } ?>


    <?php
      require 'footer.php';
    ?>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
}
else {
  header("Location: index.php");
  exit(); // it is to exist from this page and not to run below codes.
}
?>
