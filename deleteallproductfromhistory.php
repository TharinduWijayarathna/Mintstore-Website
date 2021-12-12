<?php
    session_start();

    if(isset($_SESSION["user"])){

    require "connection.php";

    $email = $_SESSION["user"]["email"];

    Database::iud("DELETE FROM `mintstore`.`invoice` WHERE  `user_email`='" . $email . "';");

}
