<?php
session_start();

require "connection.php"; //database connection file eka require kara
require 'Exception.php'; 
require 'PHPMailer.php'; 
require 'SMTP.php'; 

use PHPMailer\PHPMailer\PHPMailer;

$image = $_POST["userimg"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];

$r = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `status_id`='1'");
$rrs = $r->num_rows;

$bc = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `status_id`='2'");
$brs = $bc->num_rows;
    //database ekata data insert karanna kalin check karala balanawa e email ekata dial ekak innawada kiyala 
    if ($rrs == 1){
      $udetails = $r->fetch_assoc();
      $_SESSION["user"] = $udetails;
        // echo "Hello";
        // echo " ";
        // echo $udetails["fname"];
        
    }else if($brs == 1){
      echo "error";
      
    }else{

    $status = "1";

    $password = uniqid();    

    $d = new DateTime(); //date eka ganna eka
    $timezone = new DateTimeZone("Asia/Colombo"); //timezone eka hadanawa 
    $d->setTimezone($timezone);//date ekata timezone set karanawa 
    $date = $d->format("Y-m-d H:i:s");//date and time format eka set karanawa

    Database::iud("INSERT INTO user(`email`,`fname`,`lname`,`password`,`register_date`,`status_id`) VALUES('".$email."','".$fname."','".$lname."','".$password."','".$date."','".$status."')");

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
    $mail->Subject = 'MintStore Temporary Password'; 
    $bodyContent = '<style type="text/css" media="screen">

    /* ----- Client Fixes ----- */

    /* Force Outlook to provide a "view in browser" message */
    #outlook a {
      padding: 0;
    }

    /* Force Hotmail to display emails at full width */
    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }

    /* Force Hotmail to display normal line spacing */
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }


     /* Prevent WebKit and Windows mobile changing default text sizes */
    body, table, td, p, a, li, blockquote {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Remove spacing between tables in Outlook 2007 and up */
    table, td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */
    img {
      -ms-interpolation-mode: bicubic;
    }

     /* ----- Reset ----- */

    html,
    body,
    .body-wrap,
    .body-wrap-cell {
      margin: 0;
      padding: 0;
      background: #ffffff;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      color: #89898D;
      text-align: left;
    }

    img {
      border: 0;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    td, th {
      text-align: left;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      color: #89898D;
      line-height:1.5em;
    }

    /* ----- General ----- */

    h1, h2 {
      line-height: 1.1;
      text-align: right;
    }

    h1 {
      margin-top: 0;
      margin-bottom: 10px;
      font-size: 24px;
    }

    h2 {
      margin-top: 0;
      margin-bottom: 60px;
      font-weight: normal;
      font-size: 17px;
    }

    .outer-padding {
      padding: 50px 0;
    }

    .col-1 {
      border-right: 1px solid #D9DADA;
      width: 180px;
    }

    td.hide-for-desktop-text {
      font-size: 0;
      height: 0;
      display: none;
      color: #ffffff;
    }

    img.hide-for-desktop-image {
      font-size: 0 !important;
      line-height: 0 !important;
      width: 0 !important;
      height: 0 !important;
      display: none !important;
    }

    .body-cell {
      background-color: #ffffff;
      padding-top: 60px;
      vertical-align: top;
    }

    .body-cell-left-pad {
      padding-left: 30px;
      padding-right: 14px;
    }

    /* ----- Modules ----- */

    .brand td {
      padding-top: 25px;
    }

    .brand a {
      font-size: 16px;
      line-height: 59px;
      font-weight: bold;
    }

    .data-table th,
    .data-table td {
      width: 350px;
      padding-top: 5px;
      padding-bottom: 5px;
      padding-left: 5px;
    }

    .data-table th {
      background-color: #f9f9f9;
      color: #f8931e;
    }

    .data-table td {
      padding-bottom: 30px;
    }

    .data-table .data-table-amount {
      font-weight: bold;
      font-size: 20px;
    }

    .progress-cell,
    .progress-cell img {
      width: 90px;
      height: 48px;
    }


  </style>

  <style type="text/css" media="only screen and (max-width: 650px)">
    @media only screen and (max-width: 650px) {
      table[class*="w320"] {
        width: 320px !important;
      }

      td[class*="col-1"] {
        border: none;
      }

      td[class*="hide-for-mobile"] {
        font-size: 0 !important; line-height: 0 !important; width: 0 !important;
        height: 0 !important; display: none !important;
      }

      img[class*="hide-for-desktop-image"]{
        width: 176px !important;
        height: 135px !important;
        display:block !important;
        padding-left: 60px;
      }

      td[class*="hide-for-desktop-image"] {
        width: 100% !important;
        display: block !important;
        text-align: right !important;
      }

      td[class*="hide-for-desktop-text"] {
        display: block !important;
        text-align: center !important;
        font-size: 16px !important;
        height: 61px !important;
        padding-top: 30px !important;
        padding-bottom: 20px !important;
        color: #89898D !important;
      }

      td[class*="mobile-padding"] {
        padding-top: 15px;
      }

      td[class*="outer-padding"] {
        padding: 0 !important;
      }

      td[class*="body-cell-left-pad"] {
        padding-left: 20px;
        padding-right: 20px;
      }

      td[class*="progress-cell"],
      td[class*="progress-cell"] img {
        width: 65px !important;
        height: 35px !important;
      }

      td[class*="progress-text"] {
        font-size: 14px !important;
      }

      td[class*="progress-text-padded"] {
        padding-right: 9px !important;
      }
    }

  </style>
</head>

<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
<tr>
  <td class="outer-padding" valign="top" align="left">
  <center>
    <table class="w320" cellspacing="0" cellpadding="0" width="600">
      <tr>

        <td class="col-1 hide-for-mobile">

          <table cellspacing="0" cellpadding="0" width="100%">
            <tr>
              <td class="hide-for-mobile" style="padding:30px 0 10px 0;">
                <img width="40" height="31" src="https://www.filepicker.io/api/file/GNoaqKTQX6VXtdvaywb1" alt="logo" />
              </td>
            </tr>

            <tr>
              <td class="hide-for-mobile"  height="150" valign="top" >
                <b>
                  <span>MintStore.LK</span>
                  </b>
                <br>
                <span>No 80, MintStore, Kandy</span>
              </td>
            </tr>

            <tr>
              <td class="hide-for-mobile" style="height:180px; width:299px;">
                <img width="180" height="299"src="https://www.filepicker.io/api/file/3UaTJxcRScNj3PEVofl4" alt="large logo" />
              </td>
            </tr>
          </table>
        </td>

        <td valign="top" class="col-2">
          <table cellspacing="0" cellpadding="0" width="100%">
            <tr>
              <td class="body-cell body-cell-left-pad">
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td>


                      <table cellspacing="0" cellpadding="10" width="100%">
                        <tr>
                          <td>
                            <table cellspacing="0" cellpadding="0" width="100%">
                              <tr>
                                <td class="progress-cell"><img src="https://www.filepicker.io/api/file/HinwfjSQL6AAV2jjJujg"></td>
                                <td class="progress-cell"><img src="https://www.filepicker.io/api/file/bXzK3In5QWikXR5CB1qv"></td>
                                <td class="progress-cell"><img src="https://www.filepicker.io/api/file/PALnCdfBQOaA4FhFi5Yj"></td>
                                <td class="progress-cell"><img src="https://www.filepicker.io/api/file/rFO4xTWnSVquW0Uo1Ujw"></td>
                              </tr>
                              <tr>
                                <td class="progress-text progress-text-padded">Goto MintStore</td>
                                <td class="progress-text progress-text-padded">Goto Signup</td>
                                <td class="progress-text progress-text-padded" style="padding-left:10px">Sign With Google</td>
                                <td class="progress-text" style="text-align:right"><b>Done!</b></td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>

                      <table cellspacing="0" cellpadding="10" width="100%">
                        <tr>
                          <td>
                            <b>Account Created!</b><br>
                            Your account has successfully Created! Click below to Signin to your mintstore account! Here is your temporary Password: '.$password.'
                          </td>
                        </tr>
                      </table>

                      <table cellspacing="0" cellpadding="10" width="100%">
                        <tr>
                          <td class="hide-for-mobile"  width="94" style="width:94px;">
                            &nbsp;
                          </td>
                          <td width="150" style="width:150px;">
                            <div style="text-align:center; background-color:#48be19;"><!--[if mso]>
                                  <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:35px;v-text-anchor:middle;width:150px;" arcsize="8%" stroke="f" fillcolor="#48be19">
                                    <w:anchorlock/>
                                    <a href="http://localhost/mintstore/index.php"><center style="color:#ffffff;font-family:sans-serif;font-size:16px;">Goto MintStore</center></a>
                                  </v:roundrect>
                                <![endif]-->
                                <!--[if !mso]><!-- --><a href="#"><table cellspacing="0" cellpadding="0" width="100%"><tr><td style="background-color:#48be19;border-radius:5px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:16px;line-height:45px;text-align:center;text-decoration:none;width:150px;-webkit-text-size-adjust:none;mso-hide:all;"><span style="color:#ffffff">My account</span></td></tr></table></a>
                                <!--<![endif]-->
                              </div>
                          </td>
                          <td class="hide-for-mobile"  width="94" style="width:94px;">
                            &nbsp;
                          </td>
                        </tr>
                      </table>

                      <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                          <td style="text-align:center;padding-top:30px;">
                            <img src="https://www.filepicker.io/api/file/F7k2y1vcTu2AVmcPTkPJ" alt="signature" />
                          </td>
                        </tr>
                      </table>

                      <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                          <td class="hide-for-desktop-text">
                            <b>
                              <span>MintStore.LK</span>
                            </b>
                            <br>
                            <span>No 80, MintStore, Kandy</span>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
          </table>
        </td>

      </tr>
    </table>
  </center>
  </td>
</tr>
</table>
</body>'; 
    $mail->Body    = $bodyContent; 

    if(!$mail->send()) { 
        echo "Verification code sending failed";
    } else { 
        echo 'Success'; 
    } 
}

?>