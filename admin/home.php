<?php
    session_start();
    if(isset($_GET['cart'])){
        if($_GET['cart'] == 'Added'){
            echo "<script>alert('This product is added in your cart')</script>";
        }
        if($_GET['cart'] == 'SignInRequired'){
            echo "<script>alert('Sign in fast')</script>";
        }
        if($_GET['cart'] == 'deleted'){
            echo "<script>alert('This product is deleted from your cart')</script>";
        }
    }
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
                        <a class="nav-item nav-link active navbar-active" href="index.php">Home <span
                                class="sr-only">(current)</span></a>
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
                <form class="" action="home.php" method="post">
                    <?php
                        if(isset($_POST['search-submit'])){ ?>
                            <input value="<?php echo $_POST['keyword']; ?>" class="search-guitar" type="text" name = "keyword" placeholder="Search your guitar">
                        <?php
                        } else { ?>
                            <input class="search-guitar" type="text" name = "keyword" placeholder="Search your guitar">
                        <?php }
                    ?>

                    <button name="search-submit" class="btn btn-success my-2 my-sm-0" type="submit">
                        <img src="../images/search.jpg">
                    </button>
                </form>
            </div>
        </section>
    </header>
    <section class="container">
        <h1 class="guitar-heading">Our Guitars</h1>
        <hr class="hori-row">
    </section>

    <section class="container">
        <form class="" action="home.php" method="post">
            <button name="deviser-submit" class="brand-button" type="submit" name="deviser">DEVISER</button>
        </form>
        <form class="" action="home.php" method="post">
            <button name="axe-submit" class="brand-button" type="submit" name="axe">AXE</button>
        </form>
        <form class="" action="home.php" method="post">
            <button name="fender-submit" class="brand-button" type="submit" name="fender">FENDER</button>
        </form>
        <form class="" action="home.php" method="post">
            <button name="ibanez-submit" class="brand-button" type="submit" name="ibanez">IBANEZ</button>
        </form>
        <form class="" action="home.php" method="post">
            <button name="yamaha-submit" class="brand-button" type="submit" name="yamaha">YAMAHA</button>
        </form>
    </section>

    <div style="clear: both;"></div>


<div class="structure">
  <?php
      require 'includes/dbhandler.inc.php';

      if(isset($_POST['deviser-submit'])){
          $keyword = 'deviser';
      }

      if(isset($_POST['axe-submit'])){
          $keyword = 'axe';
      }

      if(isset($_POST['fender-submit'])){
          $keyword = 'fender';
      }

      if(isset($_POST['ibanez-submit'])){
          $keyword = 'ibanez';
      }

      if(isset($_POST['yamaha-submit'])){
          $keyword = 'yamaha';
      }

      if(isset($_POST['search-submit'])){
          $keyword = $_POST['keyword'];
      }

      if (isset($_POST['search-submit']) || isset($_POST['deviser-submit']) || isset($_POST['axe-submit']) || isset($_POST['fender-submit']) || isset($_POST['ibanez-submit']) || isset($_POST['yamaha-submit'])) {
          $query = "select * from guitar where brand like '%$keyword%' union all
          select * from guitar where model like '%$keyword%' ORDER BY RAND()";
      }

      else{
          $query = "select * from guitar ORDER BY RAND()";
      }

      $query_run = mysqli_query($conn, $query);

      while($row = mysqli_fetch_array($query_run)){
            $brand = $row['brand'];
            $model = $row['model'];
            $price = $row['price'];
            $guitar_id = $row['guitar_id'];
            $image = $row['image'];
      ?>
      <div class="description">
         <br>
          <img src="../images/guitars/<?php echo $image; ?>" class="product">
          <div class="box-text">
              <br>Brand: <?php echo $brand; ?>
              <br>Model: <?php echo $model; ?>
              <br>Product Id: <?php echo $guitar_id;?>
              <br>Price: <?php echo $price ; ?> <img class="taka" src="../images/taka.jpg" alt=""> <br>
              <form class="" action="home.php?guitar_id=<?php echo $guitar_id;?>" method="post">
                  <button name="unavailable-submit" type="submit" class="custom-button">Make Unavailable</button>
              </form>
          </div>

      </div>

       <?php
          }

?>



</div>




<?php }
else {
  header("Location: index.php?loginFirst");
  exit();
}

//Making Unavailable
if(isset($_SESSION['admin-username']) && isset($_POST['unavailable-submit'])){
    if($_GET['guitar_id']){
        $guitar_id = $_GET['guitar_id'];
    }
    $query = "update guitar set presence = FALSE where guitar_id =".$guitar_id;
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Making this product unavailable is successfull')</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
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
