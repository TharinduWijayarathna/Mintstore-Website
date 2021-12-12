<?php
session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $carts = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $_SESSION["user"]["email"] . "' ");
    $cartnm = $carts->num_rows;

    echo $cartnm;
} else {
    echo "0";
}
