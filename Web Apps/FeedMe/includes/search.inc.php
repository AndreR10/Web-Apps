<?php

require 'openconn.php';
require 'functions.php';

$output = "";

$sql = "SELECT * FROM Restaurant WHERE RestaurantName LIKE '%" . $_POST["search"] . "%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="row justify-content-md-center">';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .=   '<div class="col-6 col-md-4 my-3">
                        <div class="card">
                            <img class="card-img-top" src="IMG/Restaurants/' . $row['image'] . '" alt="' . $row['RestaurantName'] . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['RestaurantName'] . '</h5>
                                <p class="card-text"><i class="far fa-star" style="font-size:24px"></i>' . $row['rate'] . '</p>
                                <a href="restaurant_menu.php?id=' . $row['ID'] . '&name=' . $row['RestaurantName'] . '" class="btn btn-success" name="check-menu">Menu</a>
                                
                            </div>
                        </div>
                    </div>';
    }
    $output .=   '</div>';
    echo $output;
} else {

    $sql = "SELECT * FROM  Restaunrant as r WHERE r.ID in (SELECT rt.restaurant_id FROM Restaurant_Type as rt WHERE rt.kitchen_id = (SELECT k.ID FROM KitchenType as k WHERE k.Type LIKE '%" . $_POST["search"] . "%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $output .= '<div class="row justify-content-md-center">';
        while ($row = mysqli_fetch_assoc($result)) {
            $output .=   '<div class="col-6 col-md-4 my-3">
                            <div class="card">
                                <img class="card-img-top" src="IMG/Restaurants/' . $row['image'] . '" alt="' . $row['RestaurantName'] . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row['RestaurantName'] . '</h5>
                                    <p class="card-text"><i class="far fa-star" style="font-size:24px"></i>' . $row['rate'] . '</p>
                                    <a href="restaurant_menu.php?restaurant=' . $row['ID'] . '" class="btn btn-success" name="check-menu">Menu</a>
                                </div>
                            </div>
                        </div>';
        }
        $output .=   '</div>';
        echo $output;
    } else {
        echo "<div class='row justify-content-md-center'>
                <h3 class='text-center text-uppercase'> Results not found!</h3>    
            </div>'";
    }
}
