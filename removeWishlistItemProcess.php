<?php

require "connection.php";

$id = $_GET["id"];

$watchrs = Database::search("SELECT * FROM `wishlist` WHERE `id`='" . $id . "'");
$watchrow = $watchrs->fetch_assoc();

$pid = $watchrow["product_id"];
$mail = $watchrow["user_email"];

Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('" . $pid . "','" . $mail . "')");

Database::iud("DELETE FROM `wishlist` WHERE `id`='" . $id . "'");

echo "success";