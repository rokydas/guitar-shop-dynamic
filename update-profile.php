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
    <link rel="stylesheet" href="styles/signup.css">
    <title>Sign Up</title>
</head>

<body>
    <header>
        <section class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active" href="index.php">Home <span
                                class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active" href="profile.php"><?php echo $_SESSION['username'] ?></a>
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
        <section class="container sign-up-form">
          <h3 class="text-center">Update Profile</h3>

          <?php
          $user_id = $_SESSION['user_id'];
          $username = $_SESSION['username'];
          $first_name = $_SESSION['first_name'];
          $last_name = $_SESSION['last_name'];
          $email = $_SESSION['email'];
          $password = $_SESSION['password'];
          $profile_picture = $_SESSION['profile_picture'];
          $mobile_number = $_SESSION['mobile_number'];
              // echo $username;
              // echo $user_id;
              // echo $first_name;
              // echo $last_name;
              // echo $email;
              // echo $password;
              // echo $profile_picture;
              // echo $mobile_number;

              if (isset($_GET['error'])) {
                if ($_GET['error']=='emptyfields') {
                  echo "<p class='error'>Fill up all fields</p>";
                }
                if ($_GET['error']=='InvalidMailUsername') {
                  echo "<p class='error'>Invalid mail or username</p>";
                }
                else if ($_GET['error']=='InvalidMail') {
                  echo "<p class='error'>Invalid mail</p>";
                }
                else if ($_GET['error']=='InvalidUsername') {
                  echo "<p class='error'>Invalid username</p>";
                }
                else if ($_GET['error']=='PasswordCheck') {
                  echo "<p class='error'>Password and confirm password didn't match</p>";
                }
                else if ($_GET['error']=='UsernameAlredyTaken') {
                  echo "<p class='error'>Username exists</p>";
                }
                else if ($_GET['error']=='EmailAlredyTaken') {
                  echo "<p class='error'>Email exists</p>";
                }
              }

          ?>

            <form action="includes/include-update-profile.php" method="post">
                <div class="form-group">
                    <label for="exampleInputPassword1">First Name</label>
                    <input type="text" name="first_name" class="form-control" value= "<?php echo $first_name; ?>" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value= "<?php echo $last_name; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" name="username" class="form-control" value= "<?php echo $username; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value= "<?php echo $email; ?>">
                    <small id="emailHelp" class="form-text">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" value= "<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" value= "<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Profile Picture</label><br>
                    <img src="images/profile_pictures/<?php echo $profile_picture; ?>" width="300px">
                    <input class="form-control img" name="profile_picture" type="file" accept=""value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mobile Number: </label>
                    <input class="form-control" name="mobile_number" type="text" value= "<?php echo $mobile_number; ?>">
                </div>
                <button type="submit" name="final-update-submit" class="custom-button">Update</button>
            </form>
        </section>
    </header>
    <footer>
        <div class="social container">
            <a href=""><img src="images/social/fb.jpg" alt=""></a>
            <a href=""><img src="images/social/linkedin.jpg" alt=""></a>
            <a href=""><img src="images/social/instra.jpg" alt=""></a>
            <a href=""><img src="images/social/twitter.jpg" alt=""></a>
            <a href=""><img src="images/social/youtube.jpg" alt=""></a>

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
        else{
            header("Location: index.php?1");
            exit(); // it is to exist from this page and not to run below codes.
    }
