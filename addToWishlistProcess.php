<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $uemail = $_SESSION["user"]["email"];
    $id = $_GET["pid"];

    $wishfs = Database::search("SELECT * FROM `wishlist` WHERE `user_email` = '".$uemail."' ");
    $wrs = $wishfs->num_rows;

    $wishlistrs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $id . "'AND `user_email`='" . $uemail . "'");
    $n = $wishlistrs->num_rows;

    if ($wrs == 10) {
        echo "Wishlist is full";
    } else {
        if ($n == 1) {
            echo "You have recently added this product to the Wishlist";
        } else {
            Database::iud("INSERT INTO `wishlist`(`product_id`,`user_email`) VALUES ('" . $id . "','" . $uemail . "')");

            echo "success";
        }
    }
}
