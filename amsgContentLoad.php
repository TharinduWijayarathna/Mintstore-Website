<?php
require "connection.php";


$array;

$admin = Database::search("SELECT `email` FROM `admin`");
$adminNum = $admin->num_rows;

for ($x = 0; $x < $adminNum; $x++) {
    $adminData = $admin->fetch_assoc();
    $array[$x] = $adminData["email"];
}


if (isset($_POST["id"])) {

    $userHead = Database::search("SELECT * FROM `user` WHERE `email`='" . $_POST["id"] . "'");
    $userHeadData = $userHead->fetch_assoc();


    $Headprofilepec = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $userHeadData["email"] . "'");
    $Headdp = $Headprofilepec->fetch_assoc();

?>

    <div class="pb-1 px-4 border-bottom d-none d-lg-block bg-dark text-white mb-2 sticky-top">
        <div class="d-flex align-items-center py-1">
            <div class="position-relative">

                
                    <img src="assets/images/user/user.jpg" class="rounded-circle mr-1"  width="40" height="40">
              

            </div>
            <div class="flex-grow-1 pl-3">
                <strong>&nbsp;&nbsp;<?php echo $userHeadData["fname"] . " " . $userHeadData["lname"]; ?></strong>
                <div class="text-muted small"><em></em></div>
            </div>

        </div>
    </div>

    <?php

    $msg = Database::search("SELECT * FROM `chat` WHERE `from`='" . $_POST["id"] . "' OR `to`='" . $_POST["id"] . "' ORDER BY `date`");
    $msgNumRow = $msg->num_rows;

    for ($x = 0; $x < $msgNumRow; $x++) {
        $msgContenent = $msg->fetch_assoc();

        if (!in_array($msgContenent["from"], $array)) {

            $from = Database::search("SELECT * FROM `user` WHERE `email`='" . $msgContenent["from"] . "'");
            $fromData = $from->fetch_assoc();

            $profilepec = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $fromData["email"] . "'");
            $dp = $profilepec->fetch_assoc();
        }
        if ($msgContenent["from"] === $_POST["id"]) {

    ?>

            <div class="chat-message-left pb-4">
                <div>
                  
                        <img src="assets/images/user/user.jpg" class="rounded-circle mr-1"  width="40" height="40">
                   

                    <div class="text-muted small text-nowrap mt-2">
                        <!-- 2:42 am -->
                        <!-- <?php echo $msgContenent["date"] ?> -->
                    </div>
                </div>
                <div class="flex-shrink-1 rounded py-2 px-3 ml-3" style="background-color: #C2FFFF;">
                    <?php
                    $user = Database::search("SELECT * FROM `user` WHERE `email`='" . $msgContenent["from"] . "'");
                    $userData = $user->fetch_assoc();
                    ?>
                    <div class="font-weight-bold mb-1"><?php echo $userData["fname"] . " " . $userData["lname"]; ?></div>
                    <?php
                    echo $msgContenent["content"];
                    ?>
                    <br><br>
                    <?php echo $msgContenent["date"] ?>
                </div>

            </div>

        <?php
        } else {

        ?>

            <div class="chat-message-right mb-4">
                <div>

                    <img src="assets/images/user/user2.png" class="rounded-circle mr-1 ms-4"  width="40" height="40">


                    <!-- <div class="text-muted small text-nowrap mt-2"> -->
                    <!-- 2:42 am -->
                    <!-- <?php //echo $msgContenent["date"] 
                            ?> -->
                    <!-- </div> -->
                </div>
                <div class="flex-shrink-1 rounded py-2 px-3 ml-3" style="background-color: #FDE1AF;">
                    <?php
                    $admin = Database::search("SELECT * FROM `admin` WHERE `email`='" . $msgContenent["from"] . "'");
                    $adminData = $admin->fetch_assoc();
                    ?>
                    <div class="font-weight-bold mb-1"><b><?php echo $adminData["fname"] . " " . $adminData["lname"]; ?></b></div>
                    <?php
                    echo $msgContenent["content"];
                    ?>
                    <br><br>
                    <?php echo $msgContenent["date"] ?>
                </div>

            </div>

<?php
        }
    }
}
?>