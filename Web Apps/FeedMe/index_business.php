<?php
session_start();

require("includes/openconn.php");
require("includes/functions.php");
require("includes/menu.php");


$restaurant = new Menu($conn, $_SESSION['restaurantid']);


?>

<!DOCTYPE HTML>
<html lang="en,pt">

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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>



</head>

<body>
    <!--Header-->
    <?php
    require "header_business.php";
    ?>

    <nav class="navbar justify-content-center navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="add_item.php">Item</a><i class='fas fa-plus' style='font-size:24px'></i>
                </li>
                <li>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class='fas fa-search' style='font-size:24px'></i></button>
                    </form>
                </li>
            </ul>
        </div>

    </nav>

    <div class="container">
        <div class="row">
            <div class="col">

            </div>
        </div>
        <div class="row" lang="pt">
            <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Menu</h1>
            </div> -->

            <?php

            $menu = getIdMenu($_SESSION['restaurantid'], $conn);
            $categories = $restaurant->getMenuCategories($menu);
            if (count($categories) > 0) {
                foreach ($categories as $c) {
                    //$category_id = getIdCategory($c, $conn);
                    $items = $restaurant->getCategoryItems($menu, $c['id']);
                    echo "<h3>" . $c['name'] . "</h3>";

                    echo "<div class='table-responsive'>" .
                        "<table class='table table-striped  table-hover table-sm'>" .
                        "<thead>" .
                        "<tr>" .
                        "<th>Item</th>" .
                        "<th>Description</th>" .
                        "<th>Price</th>" .
                        "<th>Actions</th>" .
                        "</tr>" .
                        "</thead>" .
                        "<tbody>";

                    if (count($items) > 0) {
                        foreach ($items as $item) {
                            echo "<tr>
                                    <td>" . $item['name'] . "</td>
                                    <td>" . $item['description'] . "</td>
                                    <td>" . $item['price'] . "€" . "</td>
                                    <td><span class='px-2'><i class='fas fa-edit' style='font-size:24px'></i></span><span class='px-2'><i class='fas fa-trash-alt' style='font-size:24px'></i></span></td>
                                </tr>";
                        }
                    } else {
                        echo "<h2>No items on your menu</h2>";
                    }
                    echo "</tbody>" .
                        "</table>";
                }
            } else {
                echo "<div class='row justify-content-md-center'>
                        <h3 class='text-center text-uppercase'> No items in your menu</h3>
                        
                    '</div>'";
            }

            ?>

        </div>

    </div>
    </div>


</body>

</html>