<?php
  session_start();
  require 'includes/dbhandler.inc.php';

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
    <link rel="stylesheet" href="styles/cart.css">
    <title><?php echo $_SESSION['first_name'], ' ', $_SESSION['last_name'], "'s " ?>Cart</title>

    <script type="text/javascript">

    function cartDeleted(){
        document.getElementById('noti-text').innerText = 'This product is deleted from your cart';
        setNotification();
    }

    function setNotification(){
        document.getElementById('notification').style.display = 'block';
        setTimeout(() => {  document.getElementById('notification').style.display = 'none'; }, 3000);
    }
    </script>

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
                        <a class="nav-item nav-link active" href="profile.php"><?php echo $_SESSION['first_name'], ' ', $_SESSION['last_name'] ?></a>
                        <a class="nav-item nav-link active navbar-active" href="cart.php">Cart</a>
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
    <section class="container">
        <h1 class="guitar-heading">Your Cart</h1>
        <hr class="hori-row">
    </section>
        <div class="structure">
          <?php
          require 'includes/dbhandler.inc.php';
          $username = $_SESSION['username'];

          $query = "select * from cart";
          $query_run = mysqli_query($conn, $query);

          while($row = mysqli_fetch_array($query_run)){
                $user_cart = $row['username'];
                if ($username == $user_cart) {
                    $guitar_id = $row['guitar_id'];
                    $quantity = $row['quantity'];
                    $query2 = "select * from guitar where guitar_id =".$guitar_id;
                    $query_run2 = mysqli_query($conn, $query2);
                    while($row2 = mysqli_fetch_array($query_run2)){
                        $brand = $row2['brand'];
                        $model = $row2['model'];
                        $product_id = $row2['guitar_id'];
                        $price = $row2['price'];
                        $image = $row2['image'];
                        $presence = $row2['presence'];
                        if ($presence == TRUE) {

            ?>

                    <div style="height: 520px;" class="description">
                       <br>
                        <img src="../images/guitars/<?php echo $image; ?>" class="product">
                        <div class="box-text">
                            <br>Brand: <?php echo $brand; ?>
                            <br>Model: <?php echo $model; ?>
                            <br>Product Id: <?php echo $guitar_id;?>
                            <br>Price: <?php echo $price ; ?> <img class="taka" src="../images/taka.jpg" alt=""> <br>
                            <div class="quantity">
                                <form style="display: inline;" class="" action="includes/include-quantity.php?quantity= <?php echo $quantity; ?>&guitar_id= <?php echo $guitar_id; ?>" method="post">
                                    <button type="submit" name="minus-submit" class="btn btn-warning"><h4>-</h4></button>
                                </form>
                                <?php echo $quantity; ?>
                                <form style="display: inline;" class="" action="includes/include-quantity.php?quantity=<?php echo $quantity; ?>&guitar_id= <?php echo $guitar_id; ?>" method="post">
                                    <button type="submit" name="plus-submit" class="btn btn-warning"><h4>+</h4></button>
                                </form>
                            </div>

                            <form class="" action="includes/include-cart.php?guitar_id=<?php echo $guitar_id;?>" method="post">
                                <button name="cart-remove-submit" type="submit" class="custom-button">Remove from Cart</button>
                            </form>
                        </div>

                    </div>

                     <?php
                   } } } }
                        ?>
        </div>

        <div style="clear: both;"></div>

        <div class="container buy">
            <form class="" action="buy.php" method="post">
                <button class="buy-now-button" type="submit" name="buy-submit">BUY NOW</button>
            </form>
        </div>

        <div id='notification' class="notification">
            <h1 id='noti-text' class="text-center">This is a notification</h3>
        </div>

        <?php
            if(isset($_SESSION['user_id'])){
              if(isset($_GET['cart'])){
                  if($_GET['cart'] == 'deleted'){
                      echo "<script>cartDeleted();</script>";
                  }
              }
        ?>

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
<?php
}
else {
  header("Location: index.php");
  exit(); // it is to exist from this page and not to run below codes.
}
?>
