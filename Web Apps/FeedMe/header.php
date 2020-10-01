<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body class="bg-light">

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php" class="text-decoration-none text-dark">FeedMee</a></h5>


    <?php
    if (isset($_SESSION['idUser'])) {
      if (isset($_SESSION['idUser']) && (isset($_POST['submit-search']))) {
        echo '<form class="form-inline" action="includes/search.inc.php" method="POST">
                <input type="text" name="searchField" class="form-control  mr-sm-2" id="searchField" placeholder="Search">
              </form>';
        echo '<a class="my-2 mx-3 my-sm-0" alt="User" href=""><span class="far fa-user" style="font-size:24px;color:black">' . " " . $_SESSION['username'] . " " . '</span></a>';
        echo '<a class="my-2 mx-3 my-sm-0" alt="Shopping Cart" href=""><span class="fas fa-shopping-cart" style="font-size:24px;color:black"></span></a>';
        echo '<a class="my-2 mx-3 my-sm-0" alt="Logout" href="includes/logout.php"><span class="fas fa-sign-out-alt" style="font-size:24px;color:black"></span></a>';
      } else {
        echo '<a class="my-2 mx-3 my-sm-0" alt="User" href=""><span class="far fa-user" style="font-size:24px;color:black">' . " " . $_SESSION['username'] . " " . '</span></a>';
        echo '<a class="my-2 mx-3 my-sm-0" alt="Shopping Cart" href=""><i class="fas fa-shopping-cart" style="font-size:24px;color:black"></i><span id="cart-item" class="badge badge-danger"></span></a>';
        echo '<a class="my-2 mx-3 my-sm-0" alt="Logout" href="includes/logout.php"><span class="fas fa-sign-out-alt" style="font-size:24px;color:black"></span></a>';
      }
    } else {
      if (isset($_POST['submit-search'])) {
        echo '<form class="form-inline float-left" action="includes/search.inc.php" method="POST">
                <input type="text" name="searchField" class="form-control mr-sm-2" id="searchField" placeholder="Search">
                
              </form>';

        echo '
            <form class="form-inline" action="includes/login_config.php" method="POST">
              <input class="form-control mr-sm-2" type="text" name="emailuser" placeholder="Email/Username" aria-label="Email/Username">
              <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password" aria-label="Password">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="login"><i class="fas fa-sign-in-alt"></i></button>
            </form>';

        echo '<a class="my-2 mx-3 my-sm-0" alt="Sign Up" href="sign_up.php"><span class="fas fa-user-plus" style="font-size:24px;color:black"></span></a>';
      } else {
        echo '
            <form class="form-inline" action="includes/login_config.php" method="POST">
              <input class="form-control mr-sm-2" type="text" name="emailuser" placeholder="Email/Username" aria-label="Email/Username">
              <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password" aria-label="Password">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="login"><i class="fas fa-sign-in-alt"></i></button>
            </form>';

        echo '<a class="my-2 mx-3 my-sm-0" alt="Sign Up" href="sign_up.php"><span class="fas fa-user-plus" style="font-size:24px;color:black"></span></a>';
      }
    }

    ?>

  </div>


</body>

</html>