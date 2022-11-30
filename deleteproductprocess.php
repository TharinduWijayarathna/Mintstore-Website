<?php

require "connection.php";

$pid = $_GET["id"];

$product = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
$pn = $product->num_rows;

if ($pn == 1) {

    $imges = Database::search("SELECT * FROM `images` WHERE `product_id`='".$pid."'");
    $context = $imges->fetch_assoc();

    $filename = ("images\\product_img\\".$context["code"]);
    
    unlink( $filename );
    
    Database::iud("DELETE FROM `recent` WHERE ``product_id` = '".$pid."'");

    // Database::iud("DELETE FROM `cart` WHERE ``product_id` = '".$pid."'");
    
    Database::iud("DELETE FROM `images` WHERE `product_id` = '".$pid."'");
    
    Database::iud("DELETE FROM `product` WHERE `id` = '".$pid."'");
    echo "success";


} else {
    echo "Product Does Not Exixt.";
}
?>