<?php

session_start();
if (isset($_SESSION["user"])) {
    require "connection.php";


    $array;

    $admin = Database::search("SELECT `email` FROM `admin`");
    $adminNum = $admin->num_rows;

    for ($x = 0; $x < $adminNum; $x++) {
        $adminData = $admin->fetch_assoc();
        $array[$x] = $adminData["email"];
    }

    $msg = Database::search("SELECT * FROM `chat` WHERE `from`='" . $_SESSION["user"]["email"] . "' OR `to`='" . $_SESSION["user"]["email"] . "' ORDER BY `date`");
    $msgNumRow = $msg->num_rows;

    for ($x = 0; $x < $msgNumRow; $x++) {
        $msgContenent = $msg->fetch_assoc();

        if (!in_array($msgContenent["from"], $array)) {

            $from = Database::search("SELECT * FROM `user` WHERE `email`='" . $msgContenent["from"] . "'");
            $fromData = $from->fetch_assoc();

            $profilepec = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $fromData["email"] . "'");
            $dp = $profilepec->fetch_assoc();

            if ($x == 0) {

?>

                <div class="pb-1 px-4 border-bottom d-none d-lg-block bg-white sticky-top">
                    <div class="d-flex align-items-center py-1">
                        <div class="position-relative">

                            <img src="assets/images/user/user2.png" class="rounded-circle mr-1" width="40" height="40">


                        </div>
                        <div class="flex-grow-1 pl-3">
                            <strong>MintStore Admin</strong>
                            <div class="text-muted small"><em></em></div>
                        </div>

                    </div>
                </div>

            <?php
            }
        }
        if ($msgContenent["from"] === $_SESSION["user"]["email"]) {

            ?>

            <div class="d-flex justify-content-end">

                <div class="flex-shrink-1 rounded py-1 px-3 mt-1" style="background-color: #C2FFFF;">
                    <?php
                    $user = Database::search("SELECT * FROM `user` WHERE `email`='" . $msgContenent["from"] . "'");
                    $userDa = $user->fetch_assoc();
                    ?>
                    <div class="font-weight-bold text-end"><b><?php echo $userDa["fname"] . " " . $userDa["lname"]; ?></b></div>
                    <?php
                    echo $msgContenent["content"];
                    ?>
                    <br>
                    <?php
                    $datefix =  $msgContenent["date"];
                    $date = strtotime($datefix);
                    
                    ?>
                    <span class="float-right"><?php echo date('g:ia \o\n l', $date);?></span>
                </div>

            </div>


        <?php
        } else {

        ?>





            <div class="d-flex justify-content-right">

                <div class="flex-shrink-1 rounded py-1 px-3 mt-1" style="background-color: #FDE1AF;">
                    <?php
                    $user = Database::search("SELECT * FROM `user` WHERE `email`='" . $msgContenent["from"] . "'");
                    $userData = $user->fetch_assoc();
                    ?>
                    <div class="font-weight-bold text-start"><b>MintStore Agent</b></div>
                    <?php
                    echo $msgContenent["content"];
                    ?>
                    <br>
                    <?php
                    $datefix =  $msgContenent["date"];
                    $date = strtotime($datefix);
                    
                    ?>
                    <span class="float-right"><?php echo date('g:ia \o\n l', $date); ?></span>
                </div>

            </div>
<?php
        }
    }
}
?>