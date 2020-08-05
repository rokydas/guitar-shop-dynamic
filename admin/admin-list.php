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
                        <a class="nav-item nav-link active" href="index.php">Home <span
                                class="sr-only">(current)</span></a>
                        <a class='nav-item nav-link active' href='insert-guitar.php'>Insert Guitar</a>
                        <a class='nav-item nav-link active navbar-active' href='admin-list.php'>Admin </a>
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
    </header>
    <section class="container">
        <h1 class="guitar-heading">Our Admin Panel</h1>
        <hr class="hori-row">
    </section>
    <section class="container">

      <?php
      $active_user = $_SESSION['admin-username'];
      $query = "select * from admin ORDER BY RAND()";
      $query_run = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($query_run)){
          $username = $row['username'];
          $password = $row['password'];
        ?>
        <div class="admin-block">
            <div class="profile-pic">
                <img class="img-fluid" src="../images/profile_pictures/<?php echo $row['profile_picture']; ?>" alt="">
            </div>
            <div class="profile-description">
                <h5>Username: <?php echo $username; ?> </h5>
                <h5>Password: <?php echo $password; ?> </h5>
                <?php
                    if($active_user == $username){
                        echo '<h5>Active Status: <span style="color: #00ff00;">Active</span> </h5>';
                    }
                    else {
                        echo '<h5>Active Status: <span style="color: red;">Not Active</span> </h5>';
                    }
                ?>
            </div>
        </div>

    <?php } ?>
    </section>




<?php }
else {
  header("Location: index.php?loginFirst");
  exit();
}


?>

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
