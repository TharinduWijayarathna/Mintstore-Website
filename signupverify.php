<?php
require "connection.php";
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;


$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password2 = $_POST["password2"];
$password = $_POST["password"];

$status = "1";

if (empty($fname)) {
    echo "Please enter your first name";
} else if (strlen($fname) > 50) {
    echo "First name must be less than 50 characters";
} else if (empty($lname)) {
    echo "Please enter your last name";
} else if (strlen($lname) > 50) {
    echo "Last name must be less than 50 characters";
} else if (empty($email)) {
    echo "Please enter your email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
} else if (strlen($email) > 100) {
    echo "Email must be less than 100 characters";
} else if (empty($password)) {
    echo "Please enter your password";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Password length must between 5 to 20";
} else if ($password != $password2) {
    echo "Passowrds Does Not Match";
} else {



    if (isset($email)) {

        $e = $email;

        if (empty($email)) {

            echo "Please enter your email address";
        } else {

            $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "'");

            if ($rs->num_rows == 0) {

                $code = uniqid();

                Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $e . "'");

                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'tharinduwijayarathna8206@gmail.com';
                $mail->Password = 'Wijayarathna@123';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('tharinduwijayarathna8206@gmail.com', 'MintStore');
                $mail->addReplyTo('tharinduwijayarathna8206@gmail.com', 'MintStore');
                $mail->addAddress($e);
                $mail->isHTML(true);
                $mail->Subject = 'MintStore email verification Code';
                $bodyContent = '<h1 style="color:red;">Your Verification Code: ' . $code . '</h1>';
                $bodyContent .= '<p>MintStore Email Verify Process. Please use this code to reset your password. Thank you for use our service.</p>';
                $mail->Body    = $bodyContent;

                if (!$mail->send()) {
                    echo "Verification code sending failed";
                } else {
                  
                    $status = '1';

                    Database::iud("INSERT INTO user(`email`,`fname`,`lname`,`password`,`verification_code`,`status_id`) VALUES('".$email."','".$fname."','".$lname."','".$password."','".$code."','".$status."')");

                    echo 'Success';
                }

                // echo "Verification email sent";
            } else {
                echo "Email address Already Exists";
            }
        }
    } else {
        echo "Please enter your email address";
    }
}
