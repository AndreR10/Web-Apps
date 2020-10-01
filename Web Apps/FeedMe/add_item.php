<?php

session_start();
require("includes/functions.php");

include("includes/openconn.php");

$query = "SELECT name FROM Categories";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Item</title>
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
    <div class="container">
        <h2 class="mb-3">Add your item</h4>
            <hr>
            <form action="includes/add_item_process.php" method="POST" enctype="multipart/form-data" id="form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Item Name</label>
                        <input type="text" name="inputName" class="form-control" id="inputName">
                    </div>
                    <div class="from-group col-md-4">
                        <label for="inputCategory">Category</label>
                        <select id="inputCategory" name="inputCategory" class="form-control">
                            <option value="default" selected>Choose...</option>
                            <?php
                            while ($rows = $result->fetch_assoc()) {
                                $category = $rows['name'];
                                echo "<option value='$category'>$category</option>";
                            };
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 col-md-2">
                        <input type="text" class="form-control" data-type="currency" name="inputPrice" placeholder="Price" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group mb-3 col-md-4">
                        <input type="text" class="form-control" data-type="currency" name="inputPrice" placeholder="Price" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">€</span>

                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group col-md-12">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea class="form-control" name="inputDescription" aria-label="Description"></textarea>
                    </div>
                </div>
                <hr>
                <div class="input-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload image</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="inputImg">
                            <label class="custom-file-label" for="inputImg">Choose file</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="add-item" class="btn btn-success">Add</button>
            </form>


    </div>


</body>

</html>