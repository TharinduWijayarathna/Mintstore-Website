<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $id = $_GET["id"];
    $qtytxt = $_GET["txt"];
    $umail = $_SESSION["user"]["email"];

    if ($qtytxt < 0) {

        echo "Please enter a valid quantity";
    } else {

        if ($qtytxt == 0) {

            echo "Please enter a quantity";
        } else {

            $cartcheck = Database::search("SELECT * FROM `cart` WHERE `user_id` ='" . $umail . "'");
            $cz = $cartcheck->num_rows;

            if ($cz == 5) {

                echo "Cart is full";
            } else {

                $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $umail . "' AND `product_id`='" . $id . "' ");
                $cn = $cartrs->num_rows;

                if ($cn == 1) {

                    echo "This product is already exists in your cart";
                } else {

                    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");
                    $pr = $productrs->fetch_assoc();

                    if ($pr["qty"] >= $qtytxt) {

                        Database::iud("INSERT INTO `cart`(`user_id`,`product_id`,`qty`) VALUES ('" . $umail . "' , '" . $id . "' , '" . $qtytxt . "') ");
                        echo "success";
                    } else {

                        echo "Please enter a valid quantity below" . " " . $pr['qty'] . ".";
                    }
                }
            }
        }
    }




    // echo $id;
    // echo $qtytxt;

} else {

    echo "Please Signin or Signup First";
}
