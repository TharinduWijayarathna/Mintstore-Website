<?php
session_start();

require "connection.php";

$total = "0";
$subtotal = "0";
$shipping = "0";

if (isset($_SESSION["user"])) {

    $umail = $_SESSION["user"]["email"];

    $id = $_POST["id"];

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `id` = '" . $id . "'");
    $cn = $cartrs->num_rows;

    $cr = $cartrs->fetch_assoc();

    $productrs  = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
    $pr = $productrs->fetch_assoc();

    $total = $total + ($pr["price"] * $cr["qty"]);

    $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "'");
    $ar = $addressrs->fetch_assoc();
    $locationid = $ar["location_id"];

    $locationrs = Database::search("SELECT * FROM `location` WHERE `id` = '" . $locationid . "'");
    $lr = $locationrs->fetch_assoc();

    $districtid = $lr["district_id"];

    $ship = "0";

    if ($districtid == "2") {
        $ship = $pr["delivery_fee_colombo"];
        $shipping = $shipping + $pr["delivery_fee_colombo"];
    } else {
        $ship = $pr["delivery_fee_other"];
        $shipping = $shipping + $pr["delivery_fee_other"];
    }

    echo "Rs.";
    echo ($pr["price"] * $cr["qty"]);
    echo ".00";
}
