<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Mintstore | Track Status</title>

        <link rel="icon" href="assets/images/logo/main.png" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="robots" content="all,follow" />
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="Admin/bootstrap.min.css" />
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="Admin/font-awesome/css/font-awesome.min.css" />
        <!-- Custom Font Icons CSS-->
        <link rel="stylesheet" href="Admin/font.css" />
        <!-- Google fonts - Muli-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700" />
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="Admin/style.default.css" id="theme-stylesheet" />
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="Admin/custom.css" />
        <link rel="stylesheet" href="assets/custom/style.css">


    </head>

    <body class="bg-dark">
        <header class="header">
            <nav class="navbar navbar-expand-lg">

                <div class="
            container-fluid
            d-flex
            align-items-center
            justify-content-between
          ">
                    <div class="navbar-header">
                        <!-- Navbar Header--><a href="adminpanel.php" class="navbar-brand">
                            <div class="brand-text brand-big visible text-uppercase">
                                <strong class="text-primary">Mint</strong><strong>Store</strong>
                            </div>
                            <div class="brand-text brand-sm">
                                <strong class="text-primary">M</strong><strong>S</strong>
                            </div>
                        </a>
                        <!-- Sidebar Toggle Btn-->
                        <button class="sidebar-toggle">
                            <i class="fa fa-long-arrow-left"></i>
                        </button>
                    </div>
                    <div class="right-menu list-inline no-margin-bottom">


                        <!-- Log out -->
                        <div class="list-inline-item logout">
                            <a href="adminlogout.php" class="nav-link">Logout <i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="d-flex align-items-stretch">
            <!-- Sidebar Navigation-->
            <nav id="sidebar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center">
                    <div class="title">
                        <h1 class="h6"><?php echo $_SESSION["a"]["fname"] . " " . $_SESSION["a"]["lname"]; ?></h1>
                        <p>Admin</p>
                    </div>
                </div>
                <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="adminpanel.php"> <i class="fa fa-home"></i>Home </a>
                    </li>
                    <li>
                        <a href="manageusers.php"> <i class="fa fa-user"></i>Manage Users</a>
                    </li>
                    <li>
                        <a href="sellerproductview.php">
                            <i class="fa fa-files-o"></i>Manage Products</a>

                    </li>
                    <li>
                        <a href="addproduct.php">
                            <i class="fa fa-plus-circle"></i>Add Products
                        </a>
                    </li>
                    <li>
                        <a href="manageproducts.php"> <i class="fa fa-link"></i>Link New Items </a>
                    </li>
                    <li>
                        <a href="messages.php"> <i class="fa fa-wechat"></i>Messages</a>
                    </li>
                    <li class="active">
                        <a href="managetracking.php"> <i class="fa fa-table"></i>Tracking</a>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid bg-dark">
                <div class="row mt-4">

                    <div class="col-12 col-lg-12">
                        <div class="block margin-bottom-sm">
                            <div class="title"><strong>Order Tracking Status</strong></div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Track ID</th>
                                            <th>Order ID</th>
                                            <th>User Email</th>
                                            <th>Date</th>
                                            <th>Order Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $track = Database::search("SELECT * FROM `ordertrack`");
                                        $tracknm = $track->num_rows;

                                        for ($t = 0; $t < $tracknm; $t++) {
                                            $trackrs = $track->fetch_assoc();

                                        ?>
                                            <tr>
                                                <th><?php echo $trackrs["trackid"] ?></th>
                                                <td><?php echo $trackrs["order_id"] ?></td>
                                                <td><?php echo $trackrs["user_email"] ?></td>
                                                <td><?php
                                                    $datefix = $trackrs["date"];
                                                    $date = strtotime($datefix);
                                                    $date = strtotime("+7 day", $date);
                                                    echo date('Y:m:s', $date);

                                                    ?></td>
                                                    <?php
                                                    $tid = $trackrs["trackid"]
                                                    ?>
                                                <td><select class="form-select col-12 bg-dark text-white" id="tc" onclick="changetc('<?php echo $tid?>')" >
                                                        <?php
                                                        $sm = Database::search("SELECT * FROM `order_status` WHERE `id` = '" . $trackrs["order_status_id"] . "'");
                                                        $os = $sm->fetch_assoc();
                                                        ?>
                                                        <option value="0" hidden><?php echo $os["status"]; ?></option>
                                                        <?php
                                                        $ss = Database::search("SELECT * FROM `order_status`");
                                                        $sr = $ss->num_rows;

                                                        for ($l = 0; $l < $sr; $l++) {
                                                            $sx = $ss->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $sx["id"] ?>"><?php echo $sx["status"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

            </div>





            <script src="Admin/jquery.min.js"></script>
            <script src="Admin/bootstrap.min.js"></script>
            <script src="Admin/front.js"></script>
            <script src="script.js"></script>
    </body>

    </html>
<?php
}
?>