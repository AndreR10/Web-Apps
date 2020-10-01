<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="JS/sign-up-validation.js"></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--CSS-->
  <link href="CSS/style.css" rel="stylesheet">
</head>

<body class="bg-light">
  <?php
  require "header.php";
  ?>
  <div class="container">
    <div class="container">
      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">JOIN US!</h4>
          <!--Form-->
          <form action="includes/signup_process.php" method="POST" id="form" class="needs-validation" novalidate>
            <!--Section name-->
            <!--Sign up Errors-->

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" required>
                <span id="errorFirstname" class="helper-text text-danger font-italic"></span>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name" required>
                <span id="errorLastname" class="helper-text text-danger font-italic"></span>
              </div>
            </div>

            <hr class="mb-4">
            <!--Section password-->
            <div class="row">
              <div class=" col-md-6 mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <span id="errorPassword" class="helper-text text-danger font-italic"></span>
              </div>
              <div class=" col-md-6 mb-3">
                <label for="password">Repeat Password</label>
                <input type="password" name="password2" class="form-control" id="confirmPassword" placeholder="Password" required>
                <span id="errorConfirmPassword" class="helper-text text-danger font-italic"></span>
              </div>
            </div>

            <hr class="mb-4">
            <!--Section email-->
            <div class="mb-3">
              <label for="email">Email <span class="text-muted"></span></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
              <span id="errorEmail" class="helper-text text-danger font-italic"></span>
            </div>
            <!--Section username-->
            <div class="mb-3">
              <label for="username">Username <span class="text-muted"></span></label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Username">
              <span id="errorUsername" class="helper-text text-danger font-italic"></span>
            </div>

            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" name="sign-up" type="submit">Sign up</button>
          </form>
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