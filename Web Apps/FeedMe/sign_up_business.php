<?php
include("includes/openconn.php");

$query = "SELECT Type FROM KitchenType";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en, pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Become a partner restaurant</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="JS/sign-up-business-validation.js"></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--CSS-->
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body class="bg-light">
  <?php
  require "header_business.php";
  ?>

  <div class="container mt-4">
    <div class="row">
      <div id="background-div-signup-business" class="col-md-4 order-md-2 mb-4">
        <h1 class="text-white">Become partner of FeedMe and do more for your restaurant</h2>
          <h5 class=" py-2 text-white">We are a tecnologic service that helps companys
            expanding their business to the world.
          </h5>
      </div>

      <div class="col-md-8 order-md-1">
        <h2 class="mb-3">LET'S GET STARTED</h4>
          <!--Form-->
          <form action="includes/signup_business_process.php" method="POST" id="form" class="needs-validation" novalidate>
            <!--Section name-->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="restaurantName">Restaurant</label>
                <input type="text" name="restaurantName" class="form-control" id="inputrestaurantName" placeholder="Restaurant Name" required>
                <span id="errorRestaurantName" class="helper-text text-danger font-italic"></span>
              </div>
            </div>

            <hr class="mb-4">
            <!--Section Address-->
            <div class="form-group md-6">
              <label for="inputAddress">Address</label>
              <input type="text" name="restaurantAddress" class="form-control" id="inputAddress" placeholder="Restaurant address">
              <span id="errorAddress" class="helper-text text-danger font-italic"></span>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" name="city" class="form-control" id="inputCity">
                <span id="errorCity" class="helper-text text-danger font-italic"></span>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" name="zip" class="form-control" id="inputZip">
                <span id="errorZip" class="helper-text text-danger font-italic"></span>
              </div>
            </div>


            <hr class="mb-4">

            <!--Section Owner-->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="firstName" class="form-control" id="inputfirstName" placeholder="First Name" required>
                <span id="errorFirstname" class="helper-text text-danger font-italic"></span>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="lastName" class="form-control" id="inputlastName" placeholder="Last Name" required>
                <span id="errorLastname" class="helper-text text-danger font-italic"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="phone">Phone <span class="text-muted"></span></label>
                <input type="tel" name="phone" class="form-control" id="inputphone" placeholder="Phone Number">
                <span id="errorPhone" class="helper-text text-danger font-italic"></span>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email <span class="text-muted"></span></label>
                <input type="email" name="email" class="form-control" id="inputemail" placeholder="you@example.com">
                <span id="errorEmail" class="helper-text text-danger font-italic"></span>
              </div>
            </div>

            <hr class="mb-4">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="kitchen">Kitchen Type</label>
                <select name="type" class="custom-select mr-sm-2" id="selectType">
                  <option value='default'>Choose...</option>
                  <?php
                  while ($rows = $result->fetch_assoc()) {
                    $kitchenType = $rows['Type'];
                    echo "<option value='$kitchenType'>$kitchenType</option>";
                  };
                  ?>
                </select>
                <span id="errorKitchen" class="helper-text text-danger font-italic"></span>
              </div>
            </div>

            <hr class="mb-4">


            <!--Section password-->
            <div class="row">
              <div class=" col-md-6 mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Password" required>
                <span id="errorPassword" class="helper-text text-danger font-italic"></span>
              </div>
              <div class=" col-md-6 mb-3">
                <label for="password">Repeat Password</label>
                <input type="password" name="password2" class="form-control" id="inputconfirmPassword" placeholder="Password" required>
                <span id="errorConfirmPassword" class="helper-text text-danger font-italic"></span>
              </div>
            </div>
            <div class="input-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Upload image</span>
                </div>
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="inputImg">
                  <label class="custom-file-label" for="inputImg">Choose file</label>
                </div>
              </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-secondary btn-lg btn-block" name="sign-up-business" type="submit">Sign up</button>

          </form>
      </div>

    </div>
  </div>
  </div>

  <!--Footer-->

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2019-2020 FeedMee</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>

  </div>

</body>

</html>