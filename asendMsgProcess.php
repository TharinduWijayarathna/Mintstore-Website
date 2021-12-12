<?php

session_start();

require "connection.php";



$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

if (isset($_SESSION["a"])) {

    if (isset($_POST["id"]) && ($_POST["id"] !== "undefined")) {

        if (isset($_POST["content"]) && !empty($_POST["content"])) {
            Database::iud("INSERT INTO `chat` (`from`,`to`,`content`,`date`,`status`) VALUES ('" . $_SESSION["a"]["email"] . "','" . $_POST["id"] . "','" . $_POST["content"] . "','" . $date . "','1');");
        } else {
            echo "Enter your message";
        }
    }
} else {
?>
    <script>
        window.location = "adminsignin.php";
    </script>
<?php
}
