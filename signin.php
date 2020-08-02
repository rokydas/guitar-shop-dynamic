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
    <link rel="stylesheet" href="styles/signin.css">
    <title>Sign In</title>
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
                        <a class="nav-item nav-link active navbar-active" href="signin.php">Sign In</a>
                        <a class="nav-item nav-link active" href="signup.php">Sign Up</a>
                    </div>
                </div>
            </nav>
            <div class="heading">
                <h1>Dream Guitarist</h1>
                <h2>Welcome to our shop</h2>
                <h3>Find out your guitar in our website</h3>
            </div>
        </section>
        <section class="container sign-in-form">
            <form action="includes/include-signin.php" method="post">
              <h3 class="text-center">Sign In</h3>
              <?php
                if (isset($_GET['error'])) {
                  if($_GET['error'] == 'emptyfields'){
                    echo "<p class='error'>Fill up all fields</p>";
                  }
                  if($_GET['error'] == 'WrongPassword'){
                    echo "<p class='error'>Wrong Password</p>";
                  }
                  if($_GET['error'] == 'noUser'){
                    echo "<p class='error'>User not found</p>";
                  }
                }
              ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username / Email address</label>
                    <input type="text" name="username_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button name="login-submit" type="submit" class="custom-button">Sign In</button>
            </form>
            <p>Not registered yet? <a href="signup.php">Sign up</a> here</p>
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
