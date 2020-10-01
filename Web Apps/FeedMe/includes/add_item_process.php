<?php
session_start();
if (isset($_POST['add-item'])) {

    require 'openconn.php';
    require 'functions.php';

    $name = $_POST['inputName'];
    $category = $_POST['inputCategory'];
    $price = $_POST['inputPrice'];
    $description = $_POST['inputDescription'];

    // Where the image will be saved
    $target = "../IMG/Items/" . basename($_FILES['file']['name']);
    $img = $_FILES['file']['name'];


    $category_id = getIdCategory($category, $conn);
    $menu_id = getIdMenu($_SESSION['restaurantid'], $conn);
    $restaurant_id = $_SESSION['restaurantid'];



    $query = "SELECT * FROM Restaurants_Menus_Categories WHERE menu_id = '$menu_id' AND category_id = '$category_id'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);


    if (mysqli_num_rows($result) > 0) {
        $query = "SELECT * FROM Restaurant_Menus_Categories_Items WHERE name =?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("location: ../add_item.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);

            if ($result > 0) {
                header("location: ../sign_up.php?error=itemalreadyexists&category=" . $category . "&description=" . $description . "&price=" . $price);
                exit();
            } else {

                $insertsql = "INSERT INTO Restaurant_Menus_Categories_Items (name, description, price, image, restaurant_id, menu_id, category_id) 
                    VALUES (?,?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $insertsql)) {
                    header("location: ../add_item.php?error=sqlerror");
                    exit();
                } else {

                    mysqli_stmt_bind_param($stmt, "ssssiii", $name, $description, $price, $img, $restaurant_id, $menu_id, $category_id);
                    mysqli_stmt_execute($stmt);

                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                        header("location: ../index_business.php?additem=success");
                        exit();
                    } else {
                        header("location: ../add_item.php?error=uploaderror");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
    } else {
        $insertsql = "INSERT INTO Restaurants_Menus_Categories (restaurant_id, menu_id, category_id) VALUES ('$restaurant_id', '$menu_id', '$category_id')";
        if (!mysqli_query($conn, $insertsql)) {
            echo "Erro Restaurant_Menus_Categories";
            echo $category_id;
            echo $menu_id;
            echo $restaurant_id;
            // header("location: ../add_item.php?error=insertRestaurantMenuCategories");
            exit();
        } else {
            mysqli_close($conn);

            $query = "SELECT * FROM Restaurant_Menus_Categories_Items WHERE name =?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("location: ../add_item.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

                if ($result > 0) {
                    header("location: ../sign_up.php?error=itemalreadyexists&category=" . $category . "&description=" . $description . "&price=" . $price);
                    exit();
                } else {

                    $insertsql = "INSERT INTO Restaurant_Menus_Categories_Items (name, description, price, image, restaurant_id, menu_id, category_id) 
                    VALUES (?,?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $insertsql)) {
                        header("location: ../add_item.php?error=sqlerror");
                        exit();
                    } else {

                        mysqli_stmt_bind_param($stmt, "ssssiii", $name, $description, $price, $img, $restaurant_id, $menu_id, $category_id);
                        mysqli_stmt_execute($stmt);

                        if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                            header("location: ../index_business.php?additem=success");
                            exit();
                        } else {
                            header("location: ../add_item.php?error=uploaderror");
                            exit();
                        }
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
} else {
    header("location: ../add_item.php");
    exit();
}

// // Where the image will be saved
// $target = "../IMG/Restaurants/" . basename($_FILES['image']['name']);
// $img = $_FILES['image']['name'];

// if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
// } else {
//     echo "Error move";
// }
