<?php
session_start();

require "connection.php";

if (isset($_SESSION["user"])) {
    $wish = Database::search("SELECT * FROM `wishlist` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "' ");
    $ws = $wish->num_rows;

    echo $ws;
} else {
    echo "0";
}
