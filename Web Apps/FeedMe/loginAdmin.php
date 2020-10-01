<?php
session_start();
include("includes/openconn.php");
include("includes/login_config");
/* if (empty($_POST["Email/Username"])  ||  empty($POST["Password"])){
    header("Location: header.php");
    exit();
} */

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, md5($_POST["password"]));

$query = "select username from Admin where username = '{$username}' and pw = '{$password}'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if ($row == 1){
    $_SESSION["username"] = $username;
    $_SESSION["login]"] = 'admin';
    header("Location: pageAdmin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
    
    <!-- Custom styles for this template -->
    <link href="CSS/signin.css" rel="stylesheet">
    <link href="CSS/style.css" rel="stylesheet">
  </head>

  <body class="text-center">
        <div class="container-fluid">
            <form class="form-signin" action="pageAdmin.php" method="POST">
                <img class="mb-4" src="IMG/Ciencias_Logo_Azul-02.png" alt="" width="100" height="120">
                <h1 class="h3 mb-3 font-weight-normal">Admin sign in</h1>
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email/Username..." required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-success btn-block" name="login-submit" type="login-submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
            </form>
        </div>
    </body>
</html>