<?php
require "connection.php"; //database connection file eka require kara

$verify = $_POST["ec"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password2 = $_POST["password2"];
$password = $_POST["password"];

$status = "1";

    $r = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $rn = $r->fetch_assoc();
    //database ekata data insert karanna kalin check karala balanawa e email ekata dial ekak innawada kiyala 
    if($verify == $rn["verification_code"]){

    $d = new DateTime(); //date eka ganna eka
    $timezone = new DateTimeZone("Asia/Colombo"); //timezone eka hadanawa 
    $d->setTimezone($timezone);//date ekata timezone set karanawa 
    $date = $d->format("Y-m-d H:i:s");//date and time format eka set karanawa

    Database::iud("UPDATE user SET `register_date`='".$date."',`status_id`='".$status."' WHERE `email`= '".$email."'");

    echo "Success";
    
}else{

    Database::iud("DELETE FROM `user` WHERE `email` = '".$email."'");

    echo "Wrong Verification Code";
}
