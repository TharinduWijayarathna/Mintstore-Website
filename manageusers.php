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
        <title>Mintstore | AdminPanel</title>

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
                    <li class="active">
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
                    <li>
                        <a href="managetracking.php"> <i class="fa fa-table"></i>Tracking</a>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid bg-dark">
                <div class="row mt-4">



                    <div class="col-12 ">
                        <div class="row">
                            <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                                <div class="row">
                                    <div class="col-9">
                                        <input type="text" placeholder="Search Users" class="form-control" id="searchtxt">
                                    </div>

                                    <div class="col-3 d-grid">
                                        <button class="btn btn-golden" onclick="searchUser();">Search</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2  rounded">
                        <div class="row rounded border-bottom">
                            <div class="col-2 col-lg-1 bg-dark pt-2 pb-2 text-end border-right">
                                <span class="fw-bold fs-4 text-white">#</span>
                            </div>
                            <div class="col-1 bg-dark d-none d-lg-block pt-2 pb-2 border-right">
                                <span class="fw-bold fs-4">Profile Image</span>
                            </div>
                            <div class="col-3 bg-dark d-none d-lg-block pt-2 pb-2 border-right">
                                <span class="fw-bold fs-4 text-white">Email</span>
                            </div>
                            <div class="col-6 col-lg-2 bg-dark py-2 border-right">
                                <span class="fw-bold fs-4">User Name</span>
                            </div>
                            <div class="col-2 bg-dark pt-2 pb-2 d-none d-lg-block border-right">
                                <span class="fw-bold fs-4 text-white">Mobile</span>
                            </div>
                            <div class="col-2 bg-dark d-none d-lg-block pt-2 pb-2 border-right">
                                <span class="fw-bold fs-4">Registerd Date</span>
                            </div>
                            <div class="col-4 col-lg-1 bg-dark py-2">

                            </div>

                        </div>

                    </div>
                    <?php

                    if (isset($_SESSION["k"])) {

                        $u = $_SESSION["k"];

                        for ($s = 0; $s < sizeof($u); $s++) {

                            $client = Database::search("SELECT * FROM `user` WHERE `email`='" . $u[$s] . "'");
                            $clientdata = $client->fetch_assoc();

                    ?>
                            <div class="col-12 mb-2">
                                <div class="row text-white border-bottom">
                                    <div class="col-2 col-lg-1 bg-dark pt-2 pb-2 text-end  border-right">
                                        <span class="fw-bold fs-5"><?php echo $s + 1; ?></span>
                                    </div>
                                    <div class="col-1 bg-dark d-none d-lg-block text-center  border-right">
                                        <img src="assets/images/user/user.jpg" style="height: 70px;" />
                                    </div>
                                    <div class="col-3 bg-dark d-none d-lg-block pt-2 pb-2  border-right">
                                        <span class="fw-bold fs-5"><?php echo $u[$s]; ?></span>
                                    </div>
                                    <div class="col-6 col-lg-2 bg-dark py-2  border-right">
                                        <span class="fw-bold fs-5"><?php echo $clientdata["fname"] . " " . $clientdata["lname"];  ?></span>
                                    </div>
                                    <div class="col-2 bg-dark pt-2 pb-2 d-none d-lg-block  border-right">
                                        <span class="fw-bold fs-5 "><?php echo $clientdata["mobile"] ?></span>
                                    </div>
                                    <div class="col-2 bg-dark d-none d-lg-block pt-2 pb-2  border-right">
                                        <?php
                                        $split = explode(" ", $clientdata["register_date"]);
                                        ?>
                                        <span class="fw-bold fs-5"><?php echo $split[0]; ?></span>
                                    </div>
                                    <div class="col-4 col-lg-1 bg-dark py-2 d-grid  border-right">
                                        <?php
                                        $status = $clientdata["status_id"];

                                        if ($status == "1") {
                                        ?>
                                            <button id="blockbtn<?php echo  $clientdata['email']; ?>" class="btn btn-black-default-hover" onclick="blockuser('<?php echo  $clientdata['email']; ?>');">Block</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button id="blockbtn<?php echo  $clientdata['email']; ?>" class="btn btn-green" onclick="blockuser('<?php echo  $clientdata['email']; ?>');">Unblock</button>
                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {

                        if (isset($_GET["page"])) {
                            $pageno = $_GET["page"];
                        } else {
                            $pageno = 1;
                        }


                        $usersrs = Database::search("SELECT * FROM `user`");
                        $d = $usersrs->num_rows;
                        $row = $usersrs->fetch_assoc();

                        $result_per_page = 20;

                        $number_of_pages = ceil($d / $result_per_page);


                        $page_first_result = ((int)$pageno - 1) * $result_per_page;

                        $selectedrs = Database::search("SELECT * FROM `user` LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "");
                        $srn = $selectedrs->num_rows;

                        $c = 0;

                        while ($srow = $selectedrs->fetch_assoc()) {

                            $c++;

                        ?>

                            <div class="col-12 mb-2">
                                <div class="row text-white border-bottom">


                                    <div class="col-2 col-lg-1 bg-dark pt-2 pb-2 text-end  border-right">
                                        <span class="fw-bold fs-5" onclick="newmsgmodal();"><?php echo $c; ?></span>
                                    </div>
                                    <div class="col-1 bg-dark d-none d-lg-block text-center  border-right">
                                        <img src="assets/images/user/user.jpg" style="height: 70px;" onclick="newmsgmodal();" />
                                    </div>
                                    <div class="col-3 bg-dark d-none d-lg-block pt-2 pb-2  border-right">
                                        <span class="fw-bold fs-5" onclick="newmsgmodal();"><?php echo $srow["email"]; ?></span>
                                    </div>
                                    <div class="col-6 col-lg-2 bg-dark py-2  border-right">
                                        <span class="fw-bold fs-5" onclick="newmsgmodal();"><?php echo $srow["fname"] . " " . $srow["lname"]; ?></span>
                                    </div>
                                    <div class="col-2 bg-dark pt-2 pb-2 d-none d-lg-block  border-right">
                                        <span class="fw-bold fs-5" onclick="newmsgmodal();"><?php echo $srow["mobile"]; ?></span>
                                    </div>
                                    <div class="col-2 bg-dark d-none d-lg-block pt-2 pb-2  border-right">
                                        <span class="fw-bold fs-5" onclick="newmsgmodal();">
                                            <?php
                                            $rd = $srow["register_date"];
                                            $splitrd = explode(" ", $rd);
                                            echo $splitrd[0];
                                            ?>
                                        </span>
                                    </div>

                                    <div class="col-4 col-lg-1 bg-dark py-2 d-grid  border-right">
                                        <?php
                                        $s = $srow["status_id"];

                                        if ($s == "1") {
                                        ?>
                                            <button id="blockbtn<?php echo  $srow['email']; ?>" class="btn btn-black-default-hover" onclick="blockuser('<?php echo  $srow['email']; ?>');">Block</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button id="blockbtn<?php echo  $srow['email']; ?>" class="btn btn-green" onclick="blockuser('<?php echo  $srow['email']; ?>');">Unblock</button>
                                        <?php
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>

                        <?php
                        }


                        ?>

                        <div class="col-12 text-center fs-5 fw-bold mt-2">
                            <div class="pagination">
                                <a href="<?php if ($pageno <= 1) {
                                                echo "#";
                                            } else {
                                                echo "?page=" . ($pageno - 1);
                                            }
                                            ?>">
                                    &laquo;</a>
                                <?php
                                for ($page = 1; $page <= $number_of_pages; $page++) {
                                    if ($page == $pageno) {
                                ?>
                                        <a class="active ms-1" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="ms-1" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                <?php
                                    }
                                }
                                ?>


                                <a href="<?php
                                            if ($pageno >= $number_of_pages) {
                                                echo "#";
                                            } else {
                                                echo "?page=" . ($pageno + 1);
                                            }
                                            ?>">&raquo;
                                </a>
                            </div>
                        </div>

                    <?php
                    }
                    ?>



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