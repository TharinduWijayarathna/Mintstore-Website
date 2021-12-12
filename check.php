<?php

//index.php

//Include Configuration File
include('config.php');

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
{
    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if (!isset($token['error'])) {
        //Set the access token used for requests
        $google_client->setAccessToken($token['access_token']);

        //Store "access_token" value in $_SESSION variable for future use.
        $_SESSION['access_token'] = $token['access_token'];

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();

        //Below you can find Get profile data and store into $_SESSION variable
        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}


$userimg = $_SESSION["user_image"];
$fname = $_SESSION['user_first_name'];
$lname = $_SESSION['user_last_name'];
$email =  $_SESSION['user_email_address'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking</title>
    <link rel="icon" href="assets/images/logo/main.png" />
    <link rel="stylesheet" href="sign.css" />
    <link rel="stylesheet" href="bootstrap.css" />


</head>

<style>
    div.image-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        bottom: 0;
        background-color: #fff;
        z-index: 999999;
        text-align: center;
    }

    .image-holder {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 100px;
        height: 100px;
    }

    .image-holder img {
        width: 100%;
        margin-left: -50%;
        margin-top: -50%;
    }
</style>

<body onload="savegoogle();">

    <div class="image-container">
        <p class="image-holder">
            <img src="assets/images/banner/lite.gif" />
        </p>
    </div>

    <!-- hide data sending part -->
    <div style="display: none;">
        <input type="text" value="<?php echo $userimg ?>" id="userimg" />
        <input type="text" value="<?php echo $fname ?>" id="fname" />
        <input type="text" value="<?php echo $lname ?>" id="lname" />
        <input type="text" value="<?php echo $email ?>" id="email" />
    </div>


    <script>$('div.image-container').delay(350).fadeOut('slow');</script>
    <script src="script.js"></script>
</body>

</html>