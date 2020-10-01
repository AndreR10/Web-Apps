<?php

if (isset($_POST['sign-up'])) {

    require 'openconn.php';



    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $username = $_POST['username'];


    $query = "SELECT * FROM Users WHERE username =?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../sign_up.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_num_rows($stmt);

        if ($result > 0) {
            header("location: ../sign_up.php?error=usertaken&firstName=" . $firstname . "&lastName=" . $lastname . "&email=" . $email);
            exit();
        } else {

            $insertsql = "INSERT INTO Users (firstname, lastname, password, email, username) 
                    VALUES ( ?,?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $insertsql)) {
                header("location: ../sign_up.php?error=sqlerror");
                exit();
            } else {

                mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $password, $email, $username);
                mysqli_stmt_execute($stmt);

                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                header("location: ../index.php?signup=success");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("location: ../sign_up.php");
    exit();
}
