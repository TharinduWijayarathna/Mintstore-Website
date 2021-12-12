<?php
session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $id = $_POST["id"];
    $qty = $_POST["qty"];

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $email . "'");
    $cn = $cartrs->num_rows;

    if ($qty < 0) {
        echo "n";
    } else {
        if ($cn == 0) {
            echo "Not Found";
        } else {
            $x = Database::search("SELECT * FROM `cart` WHERE `id` = '" . $id . "'");
            $xn = $x->num_rows;

            if ($xn == 0) {
                echo "Not Found";
            } else {
                Database::iud("UPDATE `cart` SET `qty`='" . $qty . "' WHERE `user_id` = '" . $email . "' AND `id` = '" . $id . "'");
                echo "success";
            }
        }
    }
} else {
?>

<?php
}
?>