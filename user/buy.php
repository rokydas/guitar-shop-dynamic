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
    <link rel="stylesheet" href="styles/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/cart.css">
    <title>Buy</title>

    <script type="text/javascript">
    function printPageArea(areaID){
        var printContent = document.getElementById(areaID);
        var WinPrint = window.open('', '', 'width=900,height=650');
        WinPrint.document.write(printContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
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
                        <a class="nav-item nav-link active" href="cart.php">Cart</a>
                        <a class="nav-item nav-link active navbar-active" href="buy.php">Cash Memo</a>
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
    <div id="printableArea">

    <section class="container">
        <h1 class="guitar-heading">Your Digital Cash Memo</h1>
        <hr class="hori-row">
    </section>
        <div class="structure">
          <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Sl no.</th>
                    <th scope="col">Image</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
        <?php
        require 'includes/dbhandler.inc.php';
        $username = $_SESSION['username'];

        $sl = 0;
        $total_price = 0;
        $query = "select * from cart ORDER BY RAND()";
        $query_run = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($query_run)){
              $user_cart = $row['username'];
              if ($username == $user_cart) {
                  $guitar_id = $row['guitar_id'];
                  $query2 = "select * from guitar where guitar_id =".$guitar_id;
                  $query_run2 = mysqli_query($conn, $query2);
                  while($row2 = mysqli_fetch_array($query_run2)){
                      $sl = $sl + 1;
                      $brand = $row2['brand'];
                      $model = $row2['model'];
                      $product_id = $row2['guitar_id'];
                      $price = $row2['price'];
                      $total_price = $total_price + $price;
                      $image = $row2['image'];
          ?>
                    <tr>
                        <td><?php echo $sl ; ?></td>
                        <td> <img style="height: 50px;" class="buy-pic" src="../images/guitars/<?php echo $image; ?>" alt=""></td>
                        <td><?php echo $brand; ?></td>
                        <td><?php echo $model; ?></td>
                        <td><?php echo $guitar_id;?></td>
                        <td><?php echo $price ; ?></td>
                    </tr>






                   <?php
                 } } }
                      ?>
                      <tr>
                          <td colspan="4"></td>
                          <td><b>Total Price</b></td>
                          <td><b><?php echo $total_price; ?></b></td>
                      </tr>
      </tbody>
        </table>
        </div>
        </div>
        <div class="print">
            <button class="buy-now-button" onclick="printPageArea('printableArea')">Print Cash Memo</button>
        </div>



        <h1 style="margin-top: 0px; margin-bottom: 50px;" class="guitar-heading text-center">Choose Your Payment Method</h1>

        <div class="container text-center">
            <img class="payment-option" src="../images/payment/credit.jpg">
            <img class="payment-option" src="../images/payment/bkash.jpg">
            <img class="payment-option" src="../images/payment/rocket.jpg">
            <img class="payment-option" src="../images/payment/surecash.jpg">
            <img class="payment-option" src="../images/payment/nogod.jpg">
        </div>
        <div class="text-center">
          <button style="margin-bottom: 100px;" class="custom-button">Payment Completed</button>
        </div>

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
