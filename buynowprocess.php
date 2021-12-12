<?php session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $id = $_GET["id"];
    $qty = $_GET["qty"];
    $umail = $_SESSION["user"]["email"];

    $array;

    $orderID = uniqid();

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "' ");
    $pr = $product_rs->fetch_assoc();

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "' ");
    $cn = $address_rs->num_rows;

    if ($cn == 1) {

        if ($pr["qty"] >= $qty) {

            if ($qty != 0){

                $ar = $address_rs->fetch_assoc();

                // location , district , province
                $rs1 = Database::search("SELECT `location`.`id`, `province_id` , `district_id`, `city_id`, 
                city.id AS `cid`, city.name AS `c_name`, 
                city.postal_code, 
                district.id AS `did`, district.name AS `d_name`, 
                province.id AS `pid`, province.name AS `p_name` 
                FROM `location` JOIN `city` ON city.id=location.city_id
                JOIN `district` ON district.id=location.district_id
                JOIN `province` ON province.id=location.province_id WHERE `location`.id='" . $ar["location_id"] . "';");

                $locr = $rs1->fetch_assoc();

                $delivery = "0";

                if ($locr["district_id"] == "3") {
                    $delivery = $pr["delivery_fee_colombo"];
                } else {
                    $delivery = $pr["delivery_fee_other"];
                }

                $item = $pr["title"];
                $amount = $pr["price"] * $qty + (int)$delivery;

                // fname , lname , mobile , address
                $fname = $_SESSION["user"]["fname"];
                $lname = $_SESSION["user"]["lname"];
                $mobile = $_SESSION["user"]["mobile"];
                $address = $ar["line1"] . " , " . $ar["line2"];

                // city
                $cityID = $locr["city_id"];
                $city_rs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cityID . "' ");
                $cityd = $city_rs->fetch_assoc();
                $city = $cityd["name"];

                // array
                $array["id"] = $orderID;
                $array["item"] = $item;
                $array["amount"] = $amount;
                $array["fname"] = $fname;
                $array["lname"] = $lname;
                $array["email"] = $umail;
                $array["mobile"] = $mobile;
                $array["address"] = $address;
                $array["city"] = $city;



                echo json_encode($array);
            }else{
                echo "4";
            }
        } else {
            echo "3";
        }
    } else {
        echo "2";
    }
} else {

    echo "1";
}
