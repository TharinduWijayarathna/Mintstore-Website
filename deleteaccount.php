<?php

session_start();

require "connection.php";

$email = $_SESSION["user"]["email"];

Database::iud("DELETE FROM `cart` WHERE `user_id` = '".$email."' ");
Database::iud("DELETE FROM `wishlist` WHERE `user_email`= '".$email."'");
Database::iud("DELETE FROM `recent` WHERE `user_email` = '".$email."'");
Database::iud("DELETE FROM `invoice` WHERE `user_email`= '".$email."'");
Database::iud("DELETE FROM `feedback` WHERE `user_email`= '".$email."'");
Database::iud("DELETE FROM `user_has_address` WHERE `user_email` = '".$email."'");
Database::iud("DELETE FROM `user` WHERE `email` = '".$email."'");

session_destroy();

echo "1";

?>