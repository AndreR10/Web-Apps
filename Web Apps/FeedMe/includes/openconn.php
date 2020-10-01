<?php
$dbhost = "appserver-01.alunos.di.fc.ul.pt";
$dbuser = "asw021";
$dbpass = "asw021";
$dbname = "asw021";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}
