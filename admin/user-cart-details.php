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
    <link rel="stylesheet" href="styles/cart.css">
    <title>User's Cart</title>

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
                      <a class='nav-item nav-link active' href='admin-list.php'>Admin </a>
                      <a class='nav-item nav-link active navbar-active' href='user-cart.php'>User's Cart</a>
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
    <?php
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
        }
        $query = "select * from users";
        $query_run = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($query_run)){
            if($user_id == $row['user_id']){
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $user_id = $row['user_id'];
                $name = $first_name. ' '. $last_name. "'s";
            }
        }

    ?>
    <section class="container">
        <h1 class="guitar-heading"><?php echo $name; ?> Cart</h1>
        <hr class="hori-row">
    </section>
        <div class="structure">
          <?php
          require 'includes/dbhandler.inc.php';
          // $username = $_SESSION['username'];

          $query = "select * from cart";
          $query_run = mysqli_query($conn, $query);

          while($row = mysqli_fetch_array($query_run)){
                $user_cart = $row['user_id'];
                if ($user_id == $user_cart) {
                    $guitar_id = $row['guitar_id'];
                    $query2 = "select * from guitar where guitar_id =".$guitar_id;
                    $query_run2 = mysqli_query($conn, $query2);
                    while($row2 = mysqli_fetch_array($query_run2)){
                        $brand = $row2['brand'];
                        $model = $row2['model'];
                        $product_id = $row2['guitar_id'];
                        $price = $row2['price'];
                        $image = $row2['image'];
                        $presence = $row2['presence'];
                        $quantity = $row['quantity'];
                        if ($presence == TRUE) {

            ?>

                    <div class="description">
                       <br>
                        <img src="../images/guitars/<?php echo $image; ?>" class="product">
                        <div class="box-text">
                            <br>Brand: <?php echo $brand; ?>
                            <br>Model: <?php echo $model; ?>
                            <br>Product Id: <?php echo $guitar_id;?>
                            <br>Price: <?php echo $price ; ?> <img class="taka" src="../images/taka.jpg" alt=""> <br>
                            <div class="quantity">
                                Quantity: <?php echo $quantity; ?>
                            </div>
                        </div>

                    </div>

                     <?php
                   } } } }
                        ?>
        </div>

        <div style="clear: both;"></div>

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
