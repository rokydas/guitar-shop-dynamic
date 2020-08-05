<?php
    session_start();
    require 'includes/dbhandler.inc.php';
?>

<?php
if(isset($_SESSION['admin-username'])){

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
    <link rel="stylesheet" href="styles/index.css?v=<?php echo time(); ?>">
    <title>Dream Guitarist</title>
</head>

<body>
    <header style="height: auto; padding-bottom: 50px;">
        <section class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#"><img src="../images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active" href="index.php">Home <span
                                class="sr-only">(current)</span></a>
                        <a class='nav-item nav-link active navbar-active' href='insert-guitar.php'>Insert Guitar</a>
                        <a class='nav-item nav-link active' href='admin-list.php'>Admin </a>
                        <a class='nav-item nav-link active' href='user-cart.php'>User's Cart</a>
                        <a class='nav-item nav-link active' href='sell-history.php'>Sell History</a>
                        <form action='includes/include-logout.php' method='post'>
                            <button type='submit' name='logout-submit' class='nav-item nav-link active btn btn-danger' href=''>Log Out</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="heading">
                <h1>Dream Guitarist</h1>
                <h2>Welcome <span style="color: red;">Admin <?php echo $_SESSION['admin-username'] ?></span></h2>
                <h3>Now you can manage this website</h3>
            </div>
        </section>
        <section class="container sign-up-form">
          <h3 class="text-center">Insert Guitar</h3>

          <?php
            if (isset($_GET['insert'])) {
              if ($_GET['insert']=='success') {
                echo "<p class='success'>Insert Successful</p>";
              }
            }
            if (isset($_GET['error'])) {
              if ($_GET['error']=='emptyfields') {
                echo "<p class='error'>Fill up all fields</p>";
              }
              if ($_GET['error']=='priceError') {
                echo "<p class='error'>Price Should be a number</p>";
              }
            }
          ?>

            <form action="includes/include-insert-guitar.php" method="post">
                <div class="form-group">
                    <label for="exampleInputPassword1">Brand</label>
                    <input type="text" name="brand" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Model</label>
                    <input type="text" name="model" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input class="form-control" name="image" type="file" accept="image/*">
                </div>
                <button type="submit" name="insert-guitar-submit" class="custom-button">Insert Guitar</button>
            </form>
        </section>
    </header>

    <div style="clear: both;"></div>

    <footer>
        <div class="social container">
            <a href=""><img src="../images/social/fb.jpg" alt=""></a>
            <a href=""><img src="../images/social/linkedin.jpg" alt=""></a>
            <a href=""><img src="../images/social/instra.jpg" alt=""></a>
            <a href=""><img src="../images/social/twitter.jpg" alt=""></a>
            <a href=""><img src="../images/social/youtube.jpg" alt=""></a>

            <p class="copyright">Copyright © 2020 Rokomari.com</p>
        </div>
    </footer>

<?php


}
else {
  header("Location: index.php?loginFirst");
  exit();
}


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
