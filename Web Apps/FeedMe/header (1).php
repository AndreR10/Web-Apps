<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Become a partner restaurant</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="JS/sign-up-business-validation.js"></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
  
</head>

<body class="bg-light">
  
  <nav class="navbar navbar-light bg-light border-bottom shadow-sm justify-content-between">
    <a class="navbar-brand">FeedMe</a>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="text" placeholder="Email/Username" aria-label="Search">
      <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
    </form>
  </nav>
  

</body>
</html>

<?php if ($_SESSION["login"] == 'admin'){
  $html.='<a href = "pageAdmin.php"> Admin Page <span class="glyphicon glyphicon-briefcase"></span></a>';
}?>