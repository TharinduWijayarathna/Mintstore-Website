<?php
session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $his = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "' ");
    $hisn = $his->num_rows;

    echo $hisn;
} else {
    echo "0";
}
