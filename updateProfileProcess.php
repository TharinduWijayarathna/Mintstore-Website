<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $province = $_POST["p"];
    $district = $_POST["d"];
    $city = $_POST["c"];
    $postalCode = $_POST["pcode"];


    if (empty($fname)) {
        echo "Enter your first name";
    } else if (empty($lname)) {
        echo "Enter your last name";
    } else if (empty($mobile)) {
        echo "Enter your mobile number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "Invalid mobile number";
    } else if (empty($line1)) {
        echo "Enter your Address line 1";
    } else if (empty($line2)) {
        echo "Enter your Address line 2";
    } else if ($province == "0") {
        echo "Please select your Province";
    } else if ($district == "0") {
        echo "Please select your District";
    } else if ($city == "0") {
        echo "Please select your city";
    } else if (empty($postalCode)) {
        echo "Please Enter your Postal Code";
    } else {



        // Update User fname , lname , mobile
        Database::iud("UPDATE `user` SET `fname`='" . $fname . "' , `lname`='" . $lname . "' , `mobile`='" . $mobile . "' 
        WHERE `email`='" . $_SESSION["user"]["email"] . "';");

        //user session list update

        $_SESSION["user"]["fname"] = $fname;
        $_SESSION["user"]["lname"] = $lname;
        $_SESSION["user"]["mobile"] = $mobile;

        echo "1";

        // Update city
        $address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["user"]["email"] . "'");
        $nr = $address->num_rows;

        if ($nr == 1) {

            $address_fetch = $address->fetch_assoc();

            // update : province , district , city
            Database::iud("UPDATE `location` SET 
        `province_id`='" . $province . "', 
        `district_id`='" . $district . "', 
        `city_id`='" . $city . "' WHERE `id`='" . $address_fetch["location_id"] . "'");

            // update : address1 , address2 , location
            Database::iud("UPDATE `user_has_address` SET 
        `line1`='" . $line1 . "' ,
        `line2`='" . $line2 . "' 
        WHERE `user_email`='" . $_SESSION["user"]["email"] . "'");

            // Update  : postal code
            Database::iud("UPDATE `city` SET 
        `postal_code`='" . $postalCode . "' WHERE `id`='" . $city . "'");
        } else {

            $province_I = Database::iud("INSERT INTO `location` 
                                        (`province_id`,`district_id`,`city_id`) 
                                        VALUES 
                                        ('" . $province . "','" . $district . "','" . $city . "')");

            $last_id = Database::$connection->insert_id;

            $location_I = Database::iud("INSERT INTO `user_has_address` 
                                        (`user_email`,`line1`,`line2`,`location_id`) 
                                        VALUES 
                                        ('" . $_SESSION["user"]["email"] . "', '" . $line1 . "', '" . $line2 . "', '" . $last_id . "')");

            echo "2";

        }
    }
} else {
    ?>
    <script>
        window.location = "index.php";
    </script>
<?php

}
