<?php

if (isset($_POST['login-submit'])) {

    require 'openconn.php';
    require 'functions.php';



    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../sign_up_business.php?error=emptyfields");
        exit();
    } else {
        $query = "SELECT * FROM Restaurant WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../sign_up_business.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = strcmp($password, $row['Password']);

                if ($pwdCheck !== 0) {
                    header("Location: ../sign_up_business.php?error=wrongpwd");
                    exit();
                } else if ($pwdCheck == 0) {
                    session_start();
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['restaurantName'] = $row['RestaurantName'];
                    $_SESSION['restaurantid'] = getIdRestaurant($row['RestaurantName'], $conn);

                    header("Location: ../index_business.php?login=success");
                    exit();
                } else {
                    header("Location: ../sign_up_business.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("Location: ../sign_up_business.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../sign_up_business.php");
    exit();
}






if (empty($email) || empty($password)) {
    header("Location: ../login.php?error=emptyfield&email=" . $email . "&password=" . $password);
}
$query = "SELECT username FROM Users WHERE email = '$email' && password = '$password'";
$result = mysqli_query($conn, $query);

$numRows = mysqli_num_rows($result);

if ($numRows > 0) {
    $_SESSION['username'] = $email;
    header("location:user_page.php");
} else {
    header("location:login.php");
}
