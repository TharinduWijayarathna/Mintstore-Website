<?php
    require "connection.php";
    require 'Exception.php'; 
    require 'PHPMailer.php'; 
    require 'SMTP.php'; 

    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_GET["e"])){

        $e = $_GET["e"];

        if(empty($e)){

            echo "Please enter your email address";

        }else{

            $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$e."'");

            if($rs->num_rows == 1){

                $code = uniqid();

                Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$e."'");
                
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
                $mail->Subject = 'MintStore forgot password verification Code'; 
                $bodyContent = '<h1 style="color:red;">Your Verification Code: '.$code.'</h1>'; 
                $bodyContent .= '<p>MintStore Password Reset Process. Please use this code to reset your password. Thank you for use our service.</p>'; 
                $mail->Body    = $bodyContent; 

                if(!$mail->send()) { 
                    echo "Verification code sending failed";
                } else { 
                    echo 'Success'; 
                } 
 

                // echo "Verification email sent";
            }else{
                echo "Email address not found";
            }

        }
    }else{
        echo "Please enter your email address";
    }
?>