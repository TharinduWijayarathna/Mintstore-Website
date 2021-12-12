<?php
session_start();

require "connection.php";

if(isset($_SESSION["user"])){

    $email = $_POST["e"];

    $ds = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
    $x  = $ds->num_rows;

    if($x == 1){
        echo "1";
    }else{
        echo "Cannot Delete";
    }

}else{
    echo "Error";
}



// echo $email;


?>