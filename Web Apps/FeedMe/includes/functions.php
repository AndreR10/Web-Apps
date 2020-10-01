<?php

function getRestaurantInfo($id)
{
    require 'openconn.php';
    $sql = "SELECT * FROM Restaurant
                WHERE ID='$id'";
    $values = array();
    if ($result = $conn->query($sql)) {
        while ($value = $result->fetch_object()) {
            $values[] = array(
                'id' => $value->ID,
                'name' => $value->RestaurantName,
                'address' => $value->Address,
                'city' => $value->City,
                'zip' => $value->Zip,
                'rate' => $value->rate,
                'image' => $value->image,
                'firstname' => $value->OwnerFirstName,
                'lastname' => $value->OwnerLastName,
                'phone' => $value->Phone,
                'email' => $value->email,
            );
        }
    } else {
        die($conn->error);
    }

    return $values;
}

function getIdRestaurant($name, $conn)
{

    $sql = "SELECT ID FROM Restaurant WHERE RestaurantName = '$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            return $row['ID'];
        }
    } else {
        echo "No records";
    }
    mysqli_close($conn);
}

function getIdType($name, $conn)
{

    $sql = "SELECT ID FROM KitchenType WHERE Type = '$name'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            return $row['ID'];
        }
    } else {
        echo "No records";
    }
    mysqli_close($conn);
}

function getIdCategory($name, $conn)
{

    $sql = "SELECT id FROM Categories WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            return $row['id'];
        }
    } else {
        echo "No records";
    }
    mysqli_close($conn);
}

function getIdMenu($id, $conn)
{

    $sql = "SELECT menu_id FROM Restaurant_Menus WHERE restaurant_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            return $row['menu_id'];
        }
    } else {
        echo "No records";
    }
    mysqli_close($conn);
}

function getIdMenu2($name, $conn)
{

    $sql = "SELECT id FROM Menus WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            return $row['id'];
        }
    } else {
        echo "No records";
    }
    mysqli_close($conn);
}

function getItemImage($name, $conn)
{

    $sql = "SELECT image FROM Restaurant_Menus_Categories_Items WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            return $row['image'];
        }
    } else {
        echo "No records";
    }
    mysqli_close($conn);
}

function showTopRestaurant()
{
    require 'openconn.php';

    $sql = "SELECT RestaurantName, rate, Address, image FROM Restaurant LIMIT 3";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container">';
        echo        '<div class="row justify-content-md-center">';
        echo            '<div class="col-12">';
        echo                '<h3 class="text-center">TOP Restaurants</h3>';
        echo            '</div>';
        echo        '</div>';
        echo        '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo        '<div class="col-md-4 my-3">';
            echo            '<div class="card">';
            echo                '<img class="card-img-top" src="IMG/Restaurants/' . $row['image'] . '" alt="' . $row['RestaurantName'] . '">';

            echo                '<div class="card-body">';
            echo                    '<h5 class="card-title">' . $row['RestaurantName'] . '</h5><span>Rate: ' . $row['rate'] . '</span>';
            echo                    '<a href="restaurant_menu.php?restaurant=' . $row['RestaurantName'] . '" class="btn btn-primary" name="check-menu">Menu</a>';
            echo                '</div>';
            echo            '</div>';
            echo        '</div>';
        }
        echo        '</div>';
        echo '</div>';
    } else {
        echo '<div class="row">';
        echo '<h3> No restaurants avaiable</h3>';
        echo '</div>';
    }
}

function showSearch($subject)
{
    require "openconn.php";


    $sql = "SELECT * FROM Restaurant WHERE RestaurantName LIKE  '%{$subject}%'";
    $result = mysqli_query($conn, $sql);
    echo '<h3>"' . $subject . '"</h3>';
    if (mysqli_num_rows($result) > 0) {

        echo        '<div class="row justify-content-md-center">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo        '<div class="col-6 col-md-4 my-3">';
            echo            '<div class="card">';
            echo                '<img class="card-img-top" src="IMG/Restaurants/' . $row['image'] . '" alt="Card image cap">';
            echo                '<div class="card-body">';
            echo                    '<h5 class="card-title">' . $row['RestaurantName'] . '</h5>';
            echo                    '<p class="card-text"><i class="far fa-star" style="font-size:24px"></i>' . $row['rate'] . '</p>';
            echo                    '<a href="restaurant_menu.php?id=' . $row['ID'] . '&name=' . $row['RestaurantName'] . '" class="btn btn-success" name="check-menu">Menu</a>';

            echo                '</div>';
            echo            '</div>';
            echo        '</div>';
        }
        echo        '</div>';
    } else {


        $sql = "SELECT * FROM  Restaurant as r WHERE r.ID in (SELECT rt.restaurant_id FROM Restaurant_Type as rt WHERE rt.kitchen_id = (SELECT k.ID FROM KitchenType as k WHERE k.Type LIKE '%{$subject}%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo        '<div class="row justify-content-md-center">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo        '<div class="col-6 col-md-4 my-3">';
                echo            '<div class="card">';
                echo                '<img class="card-img-top" src="IMG/Restaurants/' . $row['image'] . '" alt="Card image cap">';
                echo                '<div class="card-body">';
                echo                    '<h5 class="card-title">' . $row['RestaurantName'] . '</h5><p>Rate:' . $row['rate'] . '</p>';
                echo                    '<a href="restaurant_menu.php?restaurant=' . $row['ID'] . '" class="btn btn-success" name="check-menu">Menu</a>';
                echo                '</div>';
                echo            '</div>';
                echo        '</div>';
            }
            echo        '</div>';
        } else {
            echo "<div class='row justify-content-md-center'>
                    <div class='col-6 col-md-6'>
                        <h4 class='text-center text-uppercase'> Results not found!</h4>
                        <p class='text-center'> Try something else.</p>
                    </div>
                </div>";
        }
    }
}

function showAll()
{
    require "openconn.php";


    $sql = "SELECT * FROM Restaurant";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<hr>';
        echo '<h3 class="my-5 text-center">Check other restaurants</h3>';
        echo        '<div class="row justify-content-md-center">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo        '<div class="col-6 col-md-4 my-3">';
            echo            '<div class="card">';
            echo                '<img class="card-img-top" src="IMG/Restaurants/' . $row['image'] . '" alt="Card image cap">';
            echo                '<div class="card-body">';
            echo                    '<h5 class="card-title">' . $row['RestaurantName'] . '</h5>';
            echo                    '<p class="card-text"><i class="far fa-star" style="font-size:24px"></i>' . $row['rate'] . '</p>';
            echo                    '<a href="restaurant_menu.php?id=' . $row['ID'] . '&name=' . $row['RestaurantName'] . '" class="btn btn-success" name="check-menu">Menu</a>';

            echo                '</div>';
            echo            '</div>';
            echo        '</div>';
        }
        echo        '</div>';
    }
}

function showMenu($restaurant)
{
    require "openconn.php";
    require "functions.php";
    echo $restaurant;
    $menu_id = getIdMenu($restaurant, $conn);
    echo $menu_id;
    $sql = "SELECT c.id, c.name
            FROM Categories AS c
            INNER JOIN Restaurants_Menus_Categories AS r_m_c ON r_m_c.category_id = c.id
            AND r_m_c.restaurant_id='$restaurant'
            AND r_m_c.menu_id='$menu_id'";
    $categories = array();
    if ($result = $conn->query($sql)) {
        while ($cat = $result->fetch_object()) {
            $categories[] = array('id' => $cat->id, 'name' => $cat->name);
        }
    }
    if (count($categories) > 0) {
        foreach ($categories as $c) {
            $category = $c['id'];
            $sql = "SELECT name, description, price, image, rate
                FROM Restaurant_Menus_Categories_Items
                WHERE restaurant_id='$restaurant'
                AND menu_id='$menu_id'
                AND category_id='$category'";
            $items = array();
            if ($result = $conn->query($sql)) {
                while ($item = $result->fetch_object()) {
                    $items[] = array(
                        'name' => $item->name,
                        'description' => $item->description,
                        'price' => $item->price,
                        'image' => $item->img,
                        'rate'  => $item->rate
                    );
                }
            }
            echo '<h2 class="text-center">' . $c['name'] . '</h2';

            echo '<div class="row justify-content-md-center">';

            if (count($items) > 0) {
                foreach ($items as $item) {
                    echo '<div class="col-6 col-md-4 my-3">
                                <div class="card">
                                    <img class="card-img-top" src="IMG/Items/' . $item['image'] . '" alt="' . $item['name'] . '">
                                   <div class="card-body">
                                        <h5 class="card-title">' . $item['name'] . '</h5>
                                        <p class="card-text">' . $item['description'] . '</p>
                                        <p class="card-text"><i class="far fa-star" style="font-size:24px"></i>' . $item['rate'] . '</p>
                                        <a href="#" class="btn btn-success" name="add-cart"><span class="fas fa-shopping-cart"></span></a>
                                    </div>
                                </div>
                        </div>';
                }
            } else {
                echo "<h2>No items</h2>";
            }
            echo '</div>';
        }
    } else {
        echo "<div class='row justify-content-md-center'>
                    <h3 class='text-center text-uppercase'> No items </h3>        
            '</div>'";
    }
}
