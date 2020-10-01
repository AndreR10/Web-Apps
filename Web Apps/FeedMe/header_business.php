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
  <script src="JS/sign-up-business-validation.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body class="bg-light">

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal text-white"><a href="index_business.php" class="text-white text-decoration-none">FeedMee</a></h5>

    <?php
    if (isset($_SESSION['restaurantName'])) {
      echo '<a class="my-2 mx-3 my-sm-0" href=""><span class="far fa-user" style="font-size:24px;color:white">' . " " . $_SESSION['restaurantName'] . " " . '</span></a>';
      echo '<a class="my-2 mx-3 my-sm-0" href="includes/logout.php"><span class="fas fa-sign-out-alt" style="font-size:24px;color:white"></span></a>';
    } else {
      echo '
                <form class="form-inline" action="includes/login_business.php" method="POST">
                  <input class="form-control mr-sm-2" type="text" name="email" placeholder="Email" aria-label="Email">
                  <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password" aria-label="Password">
                  <button class="btn btn-outline-light my-2 my-sm-0" name="login-submit" type="submit"><span class="fas fa-sign-in-alt" style="font-size:24px"></span></button>
                </form>';
    }
    ?>
  </div>


</body>

</html>