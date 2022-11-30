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
        <div class="list-group-item list-group-item-action border-0 bg-dark text-white">

            <div class="d-flex align-items-start" style="cursor: pointer;" onclick="(loadMessage('<?php echo $chatData['from']; ?>'))">
                <?php
                
                $from = Database::search("SELECT * FROM `user` WHERE `email`='" . $chatData["from"] . "'");
                $fromData = $from->fetch_assoc();
                
                ?>
               
                    <img src="assets/images/user/user.jpg" class="rounded-circle mr-1" width="40" height="40">
                
                <div class="flex-grow-1 ml-3">&nbsp; <?php echo $fromData["fname"] . " " . $fromData["lname"]; ?>
                    <!-- <div class="badge bg-success float-right">5</div>-->
            <!-- <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>  -->
                </div>
            </div>

        </div>
<?php
    }
}
?>