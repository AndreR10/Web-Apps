<?php


if (isset($_POST['sign-up-business'])) {

    require 'openconn.php';
    require 'functions.php';

    $restaurantName = $_POST['restaurantName'];
    $address = $_POST['restaurantAddress'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $type =  $_POST['type'];
    $password = $_POST['password'];
    $menuName = 'Main Menu';



    $img = $_FILES['file']['name'];
    // Where the image will be saved
    $target = "../IMG/Restaurants/" . basename($_FILES['file']['name']);

    $query = "SELECT * FROM Restaurant WHERE  RestaurantName = '$restaurantName'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        header("location: ../sign_up_business.php?error=restaurantalreadyexists");
        exit();
    } else {
        // Insert Table Restaurant
        $insertsql = "INSERT INTO Restaurant (RestaurantName, Address, City, Zip, image, OwnerFirstName, OwnerLastName, Phone, email, Password) 
                    VALUES ('$restaurantName', '$address', '$city', '$zip', '$img', '$firstname', '$lastname', '$phone', '$email', '$password')";
        if (!mysqli_query($conn, $insertsql)) {
            header("location: ../sign_up_business.php?error=sqlerror");
            exit();
        } else {

            move_uploaded_file($_FILES['file']['tmp_name'], $target);

            $restaurantId = getIdRestaurant($restaurantName, $conn);
            $typeId = getIdType($type, $conn);
            // Insert Table Restaurant Type
            $insertRestaurantType = "INSERT INTO Restaurant_Type (restaurant_id, kitchen_id) 
                            VALUES ('$restaurantId', '$typeId')";

            if (!mysqli_query($conn, $insertRestaurantType)) {
                header("location: ../sign_up_business.php?error=insertRestaurantTypeError");
                exit();
            } else {
                // --------------------------------------------------------
                // Insert Table Menus
                $insertMenus = "INSERT INTO Menus (name) 
                            VALUES ('$menuName')";

                if (!mysqli_query($conn, $insertMenus)) {
                    header("location: ../sign_up_business.php?error=insertMenusError");
                    exit();
                } else {
                    $menuId = mysqli_insert_id($conn);
                    // --------------------------------------------------------
                    // Insert Table Restaurant_Menus
                    $insertRestaurantMenus = "INSERT INTO Restaurant_Menus (restaurant_id, menu_id) 
                                VALUES ('$restaurantId', '$menuId')";

                    if (!mysqli_query($conn, $insertRestaurantMenus)) {
                        header("location: ../sign_up_business.php?error=insertRestaurantMenusError");
                        exit();
                    } else {
                        // --------------------------------------------------------
                        // Creation of the restaurant session 
                        session_start();
                        $_SESSION['restaurantName'] = $restaurantName;
                        $_SESSION['restaurantid'] = $restaurantId;
                        $_SESSION['type'] = $type;

                        // if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                        //     header("location: ../index_business.php?signup=success");
                        //     exit();
                        // } else {
                        //     header("location: ../sign_up_business.php?error=uploadimageerror");
                        //     exit();
                        // }
                        header("location: ../index_business.php?signup=complete");
                        exit();
                    }
                }
            }
        }
    }
    mysqli_close($conn);
} else {
    header("location: ../sign_up_business.php");
    exit();
}
