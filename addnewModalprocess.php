<?php 

session_start();

require "connection.php";

if(isset($_SESSION["a"])){
    $text = $_GET["t"];

    if(empty($text)){
        echo "You must enter a Modal";
    }else{
        $modelrs = Database::search("SELECT * FROM `model` WHERE `name`='".$text."'");
        $n = $modelrs->num_rows;

        if($n== 1){
            echo "The Modal already exists.";
        }else{
            Database::iud("INSERT INTO  `model`(`name`) VALUES ('".$text."')");

            echo "success";
        }
    }
}


?>