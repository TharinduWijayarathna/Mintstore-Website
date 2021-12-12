<?php
    session_start();

    require "connection.php";

    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember = $_POST["remember"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."' AND `status_id` = '1'");
    $n = $rs->num_rows;

    $blk = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."' AND `status_id` = '2'");
    $bs = $blk->num_rows;

    if($n==1){ //Sign in Success 
        echo "Success";

        $data = $rs->fetch_assoc();
        $_SESSION["user"] = $data;

        if($remember=="true"){ //when remember me is true 
            setcookie("e",$email,time()+(60*60*24*365));
            setcookie("p",$password,time()+(60*60*24*365));
        }else{//when remember me is false
            setcookie("e","",-1);
            setcookie("p","",-1);
        }
    }else if($bs==1){
        echo "You have been blocked";
    }else{
        echo "Invalid Details";
    }
?>