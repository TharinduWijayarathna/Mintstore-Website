<?php

session_start();
require "connection.php";

if (isset($_POST["brn"]) && isset($_POST["mod"])) {

    if ($_POST["brn"] == "0") {
        echo "Please enter brand";
    } else if ($_POST["mod"] == "0") {
        echo "Please enter model";
    } else {

        $item = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='" . $_POST["brn"] . "' AND `model_id`='" . $_POST["mod"] . "'");

        if ($item->num_rows > 0) {
            echo "Already Linked";
        } else {
            Database::iud("INSERT INTO `model_has_brand` (`brand_id`,`model_id`) VALUES ('" . $_POST["brn"] . "','" . $_POST["mod"] . "')");
            echo "success";
        }
    }
} else {
?>

    <script>
        window.location = "manageproducts.php";
    </script>

<?php
}
