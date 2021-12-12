<?php 

session_start();

require "connection.php";

if(isset($_SESSION["user"])){

    $oid = $_POST["oid"];
    $pid = $_POST["pid"];
    $email =$_POST["email"];
    $total = $_POST["total"];
    $pqty = $_POST["pqty"];

    $trackid = uniqid();

    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
    $pn = $productrs->fetch_assoc();

    $qty = $pn["qty"];
    $newqty = $qty - $pqty;

    Database::iud("UPDATE `product` SET `qty`='".$newqty."' WHERE `id` = '".$pid."'");

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice`(`order_id`,`product_id`,`user_email`,`date`,`qty`,`total`) VALUES
                ('".$oid."','".$pid."','".$email."','".$date."','".$pqty."','".$total."')");

    Database::iud("INSERT INTO `ordertrack`(`trackid`,`order_id`,`user_email`,`date`,`order_status_id`)VALUES ('".$trackid."','".$oid."','".$email."','".$date."','1')");

    echo "1";


    
}
