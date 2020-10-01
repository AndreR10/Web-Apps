<?php
session_start();
require 'includes/functions.php';
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

</head>

<body>
    <!--Header-->
    <?php
    require "header.php";
    ?>
    <div class="container-fluid mt-3 mb-1">

        <!--Search-->
        <div class="container mb-5" id="searchRecords">
            <?php
            if (isset($_POST['submit-search'])) {
                showSearch($_POST['search']);
            }

            ?>
        </div>

        <div class="container mb-5" id="searchRecords">
            <?php
            showAll();
            ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchField').keyup(function() {
            var txt = $(this).val();
            if (txt != '') {
                $('#searchRecords').html('');
                $.ajax({
                    url: "includes/search.inc.php",
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $('#searchRecords').html(data);
                    }
                });
            } else {
                $('#searchRecords').html('');

            }
        });


    });
</script>