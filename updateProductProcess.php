<?php

require "connection.php";

$title = $_POST["title"];
$qty = (int)$_POST["qty"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$head = $_POST["head"];
$desc = $_POST["desc"];
$pid = $_POST["id"];


if (empty($title)) {
    echo "Please Enter Product Title";
} else if (empty($qty)) {
    echo "Please Enter Product Quantity";
} else if (!is_int($qty)) {
    echo "Please Add a Valid Quantity.";
} else if (($qty == "0" || $qty == "e")) {
    echo "Please Enter Valid Quantity";
}else if (empty($dwc)) {
    echo "Please Insert Delivery cost inside colombo District";
} else if (!is_int($dwc)) {
    echo "Please insert a valid price for delivery cost inside Colombo district";
} else if (empty($doc)) {
    echo "Please Insert Delivery cost outside colombo District";
} else if (!is_int($doc)) {
    echo "Please insert a valid price for delivery cost outside Colombo district";
} else if (empty($head)) {
    echo "Please Enter Heading";
} else if (empty($desc)) {
    echo "Please Enter Description";
} else {

    Database::iud("UPDATE `product` SET 
    `title`='" . $title . "', `qty`='" . $qty . "',`heading`='".$head."',`description`='" . $desc . "', `delivery_fee_colombo`='" . $dwc . "', `delivery_fee_other`='" . $doc . "' WHERE 
    `id`='" . $pid . "' ");




    $allowed_image_extension = array("image/jpeg", "image/jpg", "image/png", "image/svg", "image/svg+xml");

    $img = Database::search("SELECT `code` FROM `images` WHERE `product_id`='" . $pid . "'");
    $imgn = $img->num_rows;

    $imgdata;

    for ($x = 0; $x < $imgn; $x++) {
        $imgdata[$x] = $img->fetch_assoc();
    }

    if (isset($_FILES["img0"])) {

        $file_ex = $_FILES["img0"]["type"];

        if (!in_array($file_ex, $allowed_image_extension)) {
            echo "Please Select A Valid Image.";
        } else {

            $new_img_extension;

            if ($file_ex == "image/jpeg") {
                $new_img_extension = ".jpeg";
            } else if ($file_ex == "image/jpg") {
                $new_img_extension = ".jpg";
            } else if ($file_ex == "image/png") {
                $new_img_extension = ".png";
            } else if ($file_ex == "image/svg" || $file_ex == "image/svg+xml") {
                $new_img_extension = ".svg";
            }

            $fileName = uniqid() . $new_img_extension;

            if (isset($imgdata[0])) {

                Database::iud("UPDATE `images` SET `code`='" . $fileName . "' WHERE `product_id`='" . $pid . "' AND `code`='" . $imgdata[0]["code"] . "'");
                unlink("images/product_img/" . $imgdata[0]["code"]);

                move_uploaded_file($_FILES["img0"]["tmp_name"], "images/product_img/" . $fileName);
            } else {


                move_uploaded_file($_FILES["img0"]["tmp_name"], "images/product_img/" . $fileName);

                Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('" . $fileName . "','" . $pid . "')");
            }
        }
    }

    if (isset($_FILES["img1"])) {
        $file_ex = $_FILES["img1"]["type"];

        if (!in_array($file_ex, $allowed_image_extension)) {
            echo "Please Select A Valid Image.";
        } else {

            $new_img_extension;

            if ($file_ex == "image/jpeg") {
                $new_img_extension = ".jpeg";
            } else if ($file_ex == "image/jpg") {
                $new_img_extension = ".jpg";
            } else if ($file_ex == "image/png") {
                $new_img_extension = ".png";
            } else if ($file_ex == "image/svg" || $file_ex == "image/svg+xml") {
                $new_img_extension = ".svg";
            }

            $fileName = uniqid() . $new_img_extension;

            if (isset($imgdata[1])) {

                Database::iud("UPDATE `images` SET `code`='" . $fileName . "' WHERE `product_id`='" . $pid . "' AND `code`='" . $imgdata[1]["code"] . "'");
                unlink("images/product_img/" . $imgdata[1]["code"]);

                move_uploaded_file($_FILES["img1"]["tmp_name"], "images/product_img/" . $fileName);
            } else {


                move_uploaded_file($_FILES["img1"]["tmp_name"], "images/product_img/" . $fileName);

                Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('" . $fileName . "','" . $pid . "')");
            }
        }
    }
    if (isset($_FILES["img2"])) {
        $file_ex = $_FILES["img2"]["type"];

        if (!in_array($file_ex, $allowed_image_extension)) {
            echo "Please Select A Valid Image.";
        } else {

            $new_img_extension;

            if ($file_ex == "image/jpeg") {
                $new_img_extension = ".jpeg";
            } else if ($file_ex == "image/jpg") {
                $new_img_extension = ".jpg";
            } else if ($file_ex == "image/png") {
                $new_img_extension = ".png";
            } else if ($file_ex == "image/svg" || $file_ex == "image/svg+xml") {
                $new_img_extension = ".svg";
            }

            $fileName = uniqid() . $new_img_extension;

            if (isset($imgdata[2])) {

                Database::iud("UPDATE `images` SET `code`='" . $fileName . "' WHERE `product_id`='" . $pid . "' AND `code`='" . $imgdata[2]["code"] . "'");
                unlink("images/product_img/" . $imgdata[2]["code"]);

                move_uploaded_file($_FILES["img2"]["tmp_name"], "images/product_img/" . $fileName);
            } else {


                move_uploaded_file($_FILES["img2"]["tmp_name"], "images/product_img/" . $fileName);

                Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('" . $fileName . "','" . $pid . "')");
            }
        }
    }
    if (isset($_FILES["img3"])) {
        $file_ex = $_FILES["img3"]["type"];

        if (!in_array($file_ex, $allowed_image_extension)) {
            echo "Please Select A Valid Image.";
        } else {

            $new_img_extension;

            if ($file_ex == "image/jpeg") {
                $new_img_extension = ".jpeg";
            } else if ($file_ex == "image/jpg") {
                $new_img_extension = ".jpg";
            } else if ($file_ex == "image/png") {
                $new_img_extension = ".png";
            } else if ($file_ex == "image/svg" || $file_ex == "image/svg+xml") {
                $new_img_extension = ".svg";
            }

            $fileName = uniqid() . $new_img_extension;

            if (isset($imgdata[3])) {

                Database::iud("UPDATE `images` SET `code`='" . $fileName . "' WHERE `product_id`='" . $pid . "' AND `code`='" . $imgdata[3]["code"] . "'");
                unlink("images/product_img/" . $imgdata[3]["code"]);

                move_uploaded_file($_FILES["img3"]["tmp_name"], "images/product_img/" . $fileName);
            } else {


                move_uploaded_file($_FILES["img3"]["tmp_name"], "images/product_img/" . $fileName);

                Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('" . $fileName . "','" . $pid . "')");
            }
        }
    }
}
