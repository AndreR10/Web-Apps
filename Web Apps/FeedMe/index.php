<?php
session_start();
require 'includes/functions.php';
require 'includes/openconn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FeedMee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- <script>
        $(document).ready(function(){

        })
    </script> -->
</head>

<body>
    <!--Header-->
    <?php
    require "header.php";
    ?>
    <div class="container-fluid mt-3 mb-1">
        <!--Search-->
        <div class="container mb-5" id="background-image">
            <div class="row justify-content-md-center">
                <div class="col-sm-6 py-5">
                    <h1 class="text-center">SEARCH YOUR FOOD</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-sm-6 py-5">
                    <form action="feed.php" method="POST">
                        <div class="input-group text-center input-group-lg">
                            <input class="form-control form-control-lg" type="text" name="search" placeholder="Search for food type or restaurant">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit" name="submit-search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        // showTopRestaurant();

        $sql = "SELECT * FROM Restaurant LIMIT 3";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="container">';
            echo        '<div class="row justify-content-md-center">';
            echo            '<div class="col-12 mb-3">';
            echo                '<h3 class="text-center">TOP Restaurants</h3>';
            echo            '</div>';
            echo        '</div>';
            echo        '<div class="row">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo        '<div class="col-6 col-md-4 my-3">';
                echo            '<div class="card">';
                echo                '<img class="card-img-top" src="IMG/Restaurants/' . $row['image'] . '" alt="' . $row['RestaurantName'] . '">';

                echo                '<div class="card-body">';
                echo                    '<h5 class="card-title">' . $row['RestaurantName'] . '</h5>';
                echo                    '<p class="card-text"><i class="far fa-star" style="font-size:24px"></i>' . $row['rate'] . '</p>';
                echo                    '<a href="restaurant_menu.php?id=' . $row['ID'] . '&name=' . $row['RestaurantName'] . '" class="btn btn-success" name="check-menu">Menu</a>';

                echo                '</div>';
                echo            '</div>';
                echo        '</div>';
            }
            echo        '</div>';
            echo '</div>';
        } else {
            echo '<div class="row">';
            echo    '<div class="row justify-content-md-center">';
            echo            '<div class="col col-md-6">';
            echo                '<h3> No restaurants avaiable</h3>';
            echo            '<div>';
            echo '</div>';
        }
        ?>

        <!--Footer-->
        <div class="container">
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-6 col-md">
                        <img class="mb-2" src="IMG/Ciencias_Logo_Azul-02.png" alt="logo FCUL" width="60" height="80">
                        <small class="d-block mb-3 text-muted">© 2019-2020</small>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Features</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="sign_up_business.php">Add your business</a></li>
                            <li><a class="text-muted" href="#">Work with us</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Resources</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">FAQ</a></li>
                            <li><a class="text-muted" href="#">Resource name</a></li>
                            <li><a class="text-muted" href="#">Another resource</a></li>
                            <li><a class="text-muted" href="#">Final resource</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>About</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Team</a></li>
                            <li><a class="text-muted" href="#">Locations</a></li>
                            <li><a class="text-muted" href="#">Privacy</a></li>
                            <li><a class="text-muted" href="#">Terms</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>

    </div>
</body>

</html>