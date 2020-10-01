<?php
session_start();
require 'includes/functions.php';
require 'includes/openconn.php';
$restaurantInfo = getRestaurantInfo($_GET['id']);

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>

<body>
    <!--Header-->
    <?php
    require "header.php";
    ?>

    <div class="container-fluid mt-3 mb-1">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <?php
                    echo '<div>
                            <h3>' . $restaurantInfo[0]['name'] . '</h3>
                            <p>' . $restaurantInfo[0]['address'] . ', ' . $restaurantInfo[0]['zip'] . ' ' . $restaurantInfo[0]['city'] . '</p>
                            <button type="button" class="btn btn-dark start_chat" data-touserid="' . $$restaurantInfo[0]['id'] . '" data-tousername="' . $$restaurantInfo[0]['name'] . '">Chat</button>
                        </div>';
                    ?>
                </div>
            </div>
        </div>
        <!--Menu-->
        <div class="container mb-5" id="menu">
            <h2><span class="badge badge-secondary">Menu</span></h2>
            <?php

            $restaurant = $_GET['id'];
            $menu_id = getIdMenu($restaurant, $conn);

            $sql = "SELECT c.id, c.name
                        FROM Categories AS c
                        INNER JOIN Restaurants_Menus_Categories AS r_m_c ON r_m_c.category_id = c.id
                        AND r_m_c.restaurant_id='$restaurant' AND r_m_c.menu_id='$menu_id'";
            $categories = array();
            if ($result = $conn->query($sql)) {
                while ($cat = $result->fetch_object()) {
                    $categories[] = array('id' => $cat->id, 'name' => $cat->name);
                }
            }

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
                            'id' => $item->id,
                            'name' => $item->name,
                            'description' => $item->description,
                            'price' => $item->price,
                            'image' => $item->image,
                            'rate'  => $item->rate
                        );
                    }
                }

                echo '<h4>' . $c['name'] . '</h4>';
                echo '<div class="row">';
                foreach ($items as $item) {
                    echo '<div class="col-6 col-md-4 my-3 h-50">
                            <div class="card">
                                    <img class="card-img-top" src="IMG/Items/' . $item['image'] . '" alt="' . $item['name'] . '" height="250">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $item['name'] . '</h5>
                                        <p class="card-text">' . substr($item['description'], 0, 50) . '...</p>
                                        <p class="card-text">' . $item['price'] . '€</p>
                                        <i class="far fa-star" style="font-size:24px">' . $item['rate'] . '</i>';
                    if (isset($_SESSION['idUser'])) {
                        echo '<a href="action.php?id=' . $item['id'] . '" class="btn btn-success" name="add-cart"><span class="fas fa-shopping-cart"></span></a>';
                    }

                    echo            '</div>
                                </div>
                        </div>';
                }
                echo '</div>';
            }

            ?>

            <div id="user_modal_details"></div>
        </div>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {

        function make_chat_dialog_box(to_user_id, to_user_name) {
            var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
            modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
            modal_content += '</div>';
            modal_content += '<div class="form-group">';
            modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control"></textarea>';
            modal_content += '</div><div class="form-group" align="right">';
            modal_content += '<button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat">Send</button></div></div>';
            $('#user_model_details').html(modal_content);
        }

        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            make_chat_dialog_box(to_user_id, to_user_name);
            $("#user_dialog_" + to_user_id).dialog({
                autoOpen: false,
                width: 400
            });
            $('#user_dialog_' + to_user_id).dialog('open');
        });
    });
</script>