<?php

// error_reporting(0);
session_start();

require "connection.php";

if(isset($_SESSION["a"])){

    $category = $_POST["c"];
    $brand = $_POST["b"];
    $model = $_POST["m"];
    $title = $_POST["t"];
    $condition = $_POST["co"];
    $colour = $_POST["col"];
    $qty = (int)$_POST["qty"];
    $price = (int)$_POST["p"];
    $dwc = (int)$_POST["dwc"];
    $doc = (int)$_POST["doc"];
    $head = $_POST["head"];
    $description = $_POST["desc"];
    
    
    
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");
    
    $state = 1;
    $useremail = $_SESSION["a"]["email"];
    
    if ($category == "0") {
        echo "Please Select a Category.";
    } else if ($brand == "0") {
        echo "Please Select a Brand.";
    } else if ($model == "0") {
        echo "Please Select a Model.";
    } else if (empty($title)) {
        echo "Please Add a Tittle.";
    } else if (strlen($title) > 100) {
        echo "Title Must Contain 100 or Less than 100 Characters";
    } else if ($qty == "0" || $qty == "e") {
        echo "Please Add the Quantity of your Product.";
    } else if (!is_int($qty)) {
        echo "Please Add a Valid Quantity.";
    } else if (empty($qty)) {
        echo "Please Add the Quantity of Your Product.";
    } else if (empty($price)) {
        echo "Please add the price of your product";
    } else if (!is_int($price)) {
        echo "Please insert a valid price";
    } else if (empty($dwc)) {
        echo "Please insert the delivery cost inside Colombo district";
    } else if (!is_int($dwc)) {
        echo "Please insert a valid price for delivery cost inside Colombo district";
    } else if (empty($doc)) {
        echo "Please insert the delivery cost outside Colombo district";
    } else if (!is_int($doc)) {
        echo "Please insert a valid price for delivery cost outside Colombo district";
    } else if (empty($head)) {
        echo "Please enter the heading with key features";
    } else if (empty($description)) {
        echo "Please enter the description of your product";
    } else {
        $modelHasBrand = database::search("SELECT `id` FROM `model_has_brand` WHERE `brand_id`='" . $brand . "' AND `model_id`='" . $model . "'");
        if ($modelHasBrand->num_rows == 0) {
            echo "The Product Doesn't Exists";
        } else {
    
            $imgCount = count($_FILES);
    
            if ($imgCount > 0) {
                if ($imgCount > 4) {
                    echo "Only 4 files can be uploaded!";
                } else {
    
                    $f = $modelHasBrand->fetch_assoc();
                    $modelHasBrandId = $f["id"];
    
    
    
    
                    for ($i = 0; $i < $imgCount; $i++) {
    
                        $imageFile = $_FILES["img" . $i];
    
                        $allowed_image_extentions = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                        $fileex = $imageFile["type"];
    
                        if (!in_array($fileex, $allowed_image_extentions)) {
                            echo " || Image ". ($i+1) ." is invalid.";
                        } else {
    
                            if ($i == 0) {
                                
                                Database::iud("INSERT INTO `product`(`category_id`,`model_has_brand_id`,`title`,`color_id`,`price`,`qty`,`heading`,`description`,`condition_id`,`user_email`,`status_id`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`) VALUES ('".$category."','".$modelHasBrandId."','".$title."','".$colour."','".$price."','".$qty."','".$head."','".$description."','".$condition."','".$useremail."','".$state."','".$date."','".$dwc."','".$doc."')");
    
                                echo "Product Added Successfully";
    
                                $last_id = Database::$connection->insert_id;
                               
                            }
    
                            $newimgextention;
    
                            if ($fileex == "image/jpeg") {
                                $newimgextention = ".jpeg";
                            } else if ($fileex == "image/jpg") {
                                $newimgextention = ".jpg";
                            } else if ($fileex == "image/png") {
                                $newimgextention = ".png";
                            } else if ($fileex == "image/svg") {
                                $newimgextention = ".svg";
                            }
    
                            $imgid = uniqid() . $newimgextention;
    
                            $fileName = "images/product_img/" . $imgid;
    
                            move_uploaded_file($imageFile["tmp_name"], $fileName);
    
                            Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('" . $imgid . "','" . $last_id . "')");
    
                            echo " || Image " . ($i + 1) . " was successfully uploaded";
                        }
                    }
                }
            } else {
                echo " || Please upload product images.";
            }
        }
    }
    
}else{
    ?>
    <script>alert("admin only")</script>
    <?php
}
