<?php
require "connection.php";

$array;

$admin = Database::search("SELECT `email` FROM `admin`");
$adminNum = $admin->num_rows;

for ($x = 0; $x < $adminNum; $x++) {
    $adminData = $admin->fetch_assoc();
    $array[$x] = $adminData["email"];
}




$chatHistory = Database::search("SELECT * FROM `chat` GROUP BY `from` ORDER BY `date` DESC");
$chatHistoryRowCount = $chatHistory->num_rows;

for ($x = 0; $x < $chatHistoryRowCount; $x++) {


    $chatData = $chatHistory->fetch_assoc();

    if (!in_array($chatData["from"], $array)) {

?>
        <div class="list-group-item list-group-item-action border-0" style="cursor: pointer;" onclick="(loadMsg('<?php echo $chatData['from']; ?>'))">

            <div class="d-flex align-items-start">
                <?php
                $from = Database::search("SELECT * FROM `user` WHERE `email`='" . $chatData["from"] . "'");
                $fromData = $from->fetch_assoc();
                $profilepec = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $fromData["email"] . "'");
                $dp = $profilepec->fetch_assoc();
                if (isset($dp["code"])) {
                ?>
                    <img src="admin/profile_images/<?php echo $dp["code"]; ?>" class="rounded-circle mr-1" width="40" height="40">
                <?php
                } else {
                ?>
                    <img src="admin/profile_images/49575_accept_male_user_icon.png" class="rounded-circle mr-1" width="40" height="40">
                <?php
                }
                ?>
                <div class="flex-grow-1 ml-3">&nbsp; <?php echo $fromData["fname"] . " " . $fromData["lname"]; ?>
                    <!-- <div class="badge bg-success float-right">5</div>
            <div class="small"><span class="fas fa-circle chat-online"></span> Online</div> -->
                </div>
            </div>

        </div>
<?php
    }
}
?>