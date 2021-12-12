<?php

session_start();

require "connection.php";

$array;

if (isset($_GET["s"])) {

    $text = $_GET["s"];

    if (!empty($text)) {

        $userrs = Database::search("SELECT * FROM `user` WHERE `email` LIKE '%" . $text . "%'");
        if($userrs->num_rows == 1){
            for ($x = 0; $x < $userrs->num_rows; $x++) {
                $userdata=$userrs->fetch_assoc();
                $array[$x] = $userdata["email"];
            }
            $_SESSION["k"] = $array;

            echo "success";
        }else{
            echo "wrong user";
        }
        
       
    } else {
        unset($_SESSION["k"]);
        echo "success";
    }
}
///////////////////////////////////////////////////////////////////////////////////


// session_start();

// require "connection.php";

// if (isset($_GET["s"])) {

//     $text = $_GET["s"];

//     if (!empty($text)) {

//         $userrs = Database::search("SELECT * FROM `user` WHERE `email` LIKE '%" . $text . "%' ");

//         $usr = $userrs->num_rows;

//         for ($x = 0; $x < $usr; $x++) {

//             $_SESSION["k"]  = $userrs->fetch_assoc();

//             echo $_SESSION["k"][0];

//         }

       

        // $row = $userrs->fetch_assoc();

        // $_SESSION["k"] = $row;

      //  echo "success";
//     } else {
//         echo "Please add a name to search.";
//     }
// }
