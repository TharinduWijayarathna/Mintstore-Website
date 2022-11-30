<?php

if (isset($_GET["id"])) {

    require "connection.php";

    $id = $_GET["id"];

    Database::iud("DELETE FROM `mintstore`.`invoice` WHERE  `id`='" . $id . "';");

    echo "success";
} else {
?>

    <script>
        window.location = "purchasehistory.php";
    </script>

<?php
}
