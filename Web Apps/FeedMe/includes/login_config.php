<?php
if (isset($_POST['login'])) {
    require 'openconn.php';

    $emailuser = $_POST['emailuser'];
    $password = $_POST['password'];

    if (empty($emailuser) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $query = "SELECT * FROM Users WHERE email=? OR username=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $emailuser, $emailuser);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {;
                $passCheck = strcmp($password, $row['password']);
                if ($passCheck !== 0) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                } else if ($passCheck == 0) {

                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['idUser'] = $row['ID'];
                    $_SESSION['Name'] = $row['firstName'];

                    header("Location: ../index.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
