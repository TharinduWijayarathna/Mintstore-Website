<?php
//index.php
require "connection.php";
//Include Configuration File
include('config.php');

$login_button = '';

//Create a URL to obtain user authorization
$login_button = $google_client->createAuthUrl();

if (isset($_SESSION["user"])) {
?>
<script>
   window.location = "index.php";
</script>
<?php
} else {
?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <script src="icons.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="assets/css/sign.css" />
      <link rel="icon" href="assets/images/logo/main.png" />
      <link rel="stylesheet" href="bootstrap.css" />
      <title>MintStore | Join</title>
   </head>

   <body>
      <div class="wrapper">
         <div class="headline">
            <h1>Welcome to MintStore</h1>
            <h6>Get the best devices you want from the right place</h6>
         </div>
         <form class="form">
            <?php
            $e = "";
            $p = "";

            if (isset($_COOKIE["e"])) {
               $e = $_COOKIE["e"];
            }
            if (isset($_COOKIE["p"])) {
               $p = $_COOKIE["p"];
            }
            ?>
            <div class="signup">
               <span class="text-danger" id="msg2"></span>
               <div class="form-group">
                  <input type="email" placeholder="Email" value="<?php echo $e; ?>" id="logemail">
               </div>
               <div class="form-group">
                  <input type="password" placeholder="Password" value="<?php echo $p; ?>" id="logpw">
               </div>

               <div class="forget-password">
                  <div class="check-box">
                     <input type="checkbox" id="remember">
                     <label for="checkbox">Remember me</label>
                  </div>
                  <a href="#" onclick="forgetPassword();">Forget password?</a>
               </div>
               <button class="btn" onclick="login();">LOGIN</button>
               <?php
               if ($login_button == '') {
               } else {
               ?>

                  <button class="btn2"><a class="text-decoration-none text-white" href="<?php echo $login_button ?>">LOGIN WITH GOOGLE</a></button>

               <?php
               }
               ?>

               <div class="account-exist">
                  Create New a account? <a href="#" id="login">Signup</a>
               </div>
            </div>
            <div class="signin">
               <span class="text-danger" id="msg"></span>
               <div class="form-group">
                  <input type="text" id="fn" placeholder="Enter First name">
               </div>
               <div class="form-group">
                  <input type="text" id="ln" placeholder="Enter Last name">
               </div>
               <div class="form-group">
                  <input type="email" id="em" placeholder="Enter Email">
               </div>
               <div class="form-group inl">
                  <input type="password" id="pw" placeholder="Type Password" style="width: 50%">
                  <input type="password" id="pw2" placeholder="Retype Password" style="width:50%">
               </div>
               <div class="check-box">
                  <input type="checkbox" id="checkbox" onclick="showorhidepw();">
                  <label for="checkbox" id="pwtxt">Show Password</label>
               </div>

               <button onclick="signup();" class="btn">SIGN UP</button>
               <?php
               if ($login_button == '') {
               } else {
               ?>
                  <button class="btn2"><a class="text-decoration-none text-white" href="<?php echo $login_button ?>">SIGNUP WITH GOOGLE</a></button>
               <?php
               }
               ?>
               <div class="account-exist">
                  Already have an account? <a href="#" id="signup">Login</a>
               </div>
            </div>

         </form>
      </div>

      <!-- modal -->

      <div class="modal fade" tabindex="-1" id="forgetPasswordModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Password Reset</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="row g-3">
                     <div class="col-6">
                        <label class="form-label">New Password</label>
                        <div class="input-group mb-3">
                           <input class="form-control" type="password" id="np" />
                           <button class="btn btn-outline-primary" id="npbtn1" type="button" onclick="showPassword1();">Show</button>
                        </div>
                     </div>
                     <div class="col-6">
                        <label class="form-label">Re-type Password</label>
                        <div class="input-group mb-3">
                           <input class="form-control" type="password" id="rnp" />
                           <button class="btn btn-outline-primary" id="npbtn2" type="button" onclick="showPassword2();">Show</button>
                        </div>
                     </div>
                     <div class="col-12">
                        <label class="form-label">Verification Code</label>
                        <input class="form-control" type="text" id="vc" />
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
               </div>
            </div>
         </div>
      </div>

      <!-- modal -->

      <!-- modal -->

      <div class="modal fade" tabindex="-1" id="verify">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Email Verify</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="row g-3">

                     <div class="col-12">
                        <label class="form-label">Verification Code</label>
                        <input class="form-control" type="text" id="ec" />
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="signverify();">Verify</button>
               </div>
            </div>
         </div>
      </div>

      <!-- modal -->

      <!-- modal -->

      <div class="modal fade" tabindex="-1" id="ermd">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Warning</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="row g-3">
                     <div>
                        <h6 id="txts"></h6>
                     </div>

                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>

      <!-- modal -->

      <script src="assets/js/sign.js"></script>
      <script src="bootstrap.js"></script>
      <script src="script.js"></script>

   </body>

   </html>
<?php
}
?>