<?php

require "connection.php";

require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["e"])) {

    $email = $_POST["e"];

    if (empty($email)) {
        echo "Please enter your Email address.";
    } else {

        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");
        $an = $adminrs->num_rows;

        if ($an == 1) {

            $code = uniqid();

            Database::iud("UPDATE `admin` SET `verification`='" . $code . "' WHERE `email`='" . $email . "'");

                 //Email Code
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
                 $mail->addAddress($email);
                 $mail->isHTML(true);
                 $mail->Subject = 'MintStore Admin Verification Code';
                 $bodyContent = '<h1 style="color:red;">Your Verfication Code : ' . $code . '</h1>';
                 $mail->Body    = $bodyContent;
     
                 if (!$mail->send()) {
                     echo 'Verfication code sending fail' . $mail->ErrorInfo;
                 } else {

                     echo 'Success';
                 }

        } else {
            echo "You are not a valid User";
        }
    }
}
