<?php 
require "connection.php";

$id = $_GET["tag"];
$tid = $_GET["tid"];

$x = Database::search("SELECT * FROM `ordertrack` WHERE `trackid`='".$tid."'");
$xs = $x->num_rows;

if($xs == 1){
    Database::iud("UPDATE `ordertrack` SET `order_status_id`='".$id."' WHERE `trackid` = '".$tid."'");

    echo "success";
}else{
    echo "Error Please Check";
}



?>