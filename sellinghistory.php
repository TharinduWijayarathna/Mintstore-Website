<?php

session_start();

require "connection.php";

if (isset($_GET["f"])) {
    $from = $_GET["f"];
}
if (isset($_GET["t"])) {
    $to = $_GET["t"];
}



if (isset($_GET["page"])) {
    $pageno = $_GET["page"];
} else {
    $pageno = 1;
}


?>

<!DOCTYPE html>

<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mintstore | Selling History</title>

    <link rel="icon" href="assets/images/logo/main.png" />


    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">

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
    <link rel="stylesheet" href="bootstrap.css">

</head>

<body class=" bg-dark">



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
                            <strong class="text-danger fw-bold">Mint</strong><strong class="fw-bold">Store</strong>
                        </div>
                        <div class="brand-text brand-sm">
                            <strong class="text-danger fw-bold">M</strong><strong class="fw-bold">S</strong>
                        </div>
                    </a>
                    
                </div>
                <div class="right-menu list-inline no-margin-bottom">


                <div class="list-inline-item logout">
                        <a href="adminpanel.php" class="nav-link">Home <i class="fa fa-home"></i></a>
                    </div>
                    <!-- Log out -->
                    <div class="list-inline-item logout">
                        <a href="adminlogout.php" class="nav-link">Logout <i class="fa fa-sign-out"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">

    <div class="row bg-dark mt-4">

    

        <div class="col-12 bg-dark rounded">
            <div class="row">
                <div class="offset-0 offset-lg-2 col-12 col-lg-8 mb-3">
                    <div class="row">
                        <div class="col-9">
                            <input type="text" class="form-control border-secondary bg-dark text-white" placeholder="Search Selling History" id="searchtxt" />
                        </div>
                        <div class="col-3 d-grid">
                            <button class="btn btn-primary" onclick="searchProductHistory('1');">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3 mb-2 text-center">
            <div class="row">
                <div class="col-2 bg-primary pt-2 pb-2 text-end">
                    <span class="fs-4 fw-bold text-white">Order ID</span>
                </div>
                <div class="col-6 col-lg-2 col-lg-3 bg-primary text-white pt-2 pb-2">
                    <span class="fs-4 fw-bold">Product</span>
                </div>
                <div class="col-4 col-lg-3 bg-primary pt-2 pb-2">
                    <span class="fs-4 fw-bold text-white">Buyer</span>
                </div>
                <div class="col-6 col-lg-2 bg-primary text-white pt-2 pb-2 d-none d-lg-block">
                    <span class="fs-4 fw-bold">Price</span>
                </div>
                <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                    <span class="fs-4 fw-bold text-white">Quantity</span>
                </div>
            </div>
        </div>

        <div id="data">

            <?php

            if (!empty($from) && empty($to)) {

                $fromrs = Database::search("SELECT * FROM `invoice`");
                $fn = $fromrs->num_rows;

                for ($x = 0; $x < $fn; $x++) {
                    $fr = $fromrs->fetch_assoc();
                    $fromdate = $fr["date"];
                    $product_id = $fr["product_id"];

                    $splitdate = explode(" ", $fromdate);
                    $date = $splitdate[0];

                    if ($from == $date) {

            ?>

                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col-2 bg-primary pt-2 pb-2 text-end">
                                    <span class="fs-5 fw-bold text-white"><?php echo $fr["order_id"]; ?></span>
                                </div>

                                <?php
                                $product_details = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_id . "'");
                                $pd = $product_details->fetch_assoc();
                                ?>

                                <div class="col-6 col-lg-2 col-lg-3 bg-primary pt-2 pb-2 text-center">
                                    <span class="fs-5 fw-bold"><?php echo $pd["title"]; ?></span>
                                </div>
                                <?php
                                $user_r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $fr["user_email"] . "' ");
                                $userd = $user_r->fetch_assoc();
                                ?>
                                <div class="col-4 col-lg-3 bg-primary pt-2 pb-2">
                                    <span class="fs-5 fw-bold text-white"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></span>
                                </div>
                                <div class="col-6 col-lg-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold">Rs. <?php echo $pd["price"]; ?> .00</span>
                                </div>
                                <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold text-white"><?php echo $fr["qty"]; ?></span>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                }
            } else if (!empty($from) && !empty($to)) {

                $betweenrs = Database::search("SELECT * FROM `invoice`");
                $bn = $betweenrs->num_rows;

                for ($x = 0; $x < $bn; $x++) {
                    $br = $betweenrs->fetch_assoc();
                    $betweendate = $br["date"];
                    $product_id = $br["product_id"];

                    $splitdate = explode(" ", $betweendate);
                    $date = $splitdate[0];

                    if ($from <= $date && $to >= $date) {

                    ?>

                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col-2 bg-primary pt-2 pb-2 text-end">
                                    <span class="fs-5 fw-bold text-white"><?php echo $br["order_id"]; ?></span>
                                </div>
                                <?php
                                $product_details = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_id . "'");
                                $pd = $product_details->fetch_assoc();
                                ?>
                                <div class="col-6 col-lg-2 col-lg-3 bg-primary pt-2 pb-2 text-center">
                                    <span class="fs-5 fw-bold"><?php echo $pd["title"]; ?></span>
                                </div>
                                <?php
                                $user_r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $br["user_email"] . "' ");
                                $userd = $user_r->fetch_assoc();
                                ?>
                                <div class="col-4 col-lg-3 bg-primary pt-2 pb-2">
                                    <span class="fs-5 fw-bold text-white"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></span>
                                </div>
                                <div class="col-6 col-lg-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold"><?php echo $pd["price"]; ?></span>
                                </div>
                                <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold text-white"><?php echo $pd["qty"]; ?></span>
                                </div>
                            </div>
                        </div>

                    <?php

                    }
                }
            } else if (empty($from) && empty($to)) {

                $todayrs = Database::search("SELECT * FROM `invoice`");
                $tn = $todayrs->num_rows;

                for ($z = 0; $z < $tn; $z++) {

                    $tr = $todayrs->fetch_assoc();
                    $nodate = $tr["date"];
                    $product_id = $tr["product_id"];

                    $splitdate = explode(" ", $nodate);
                    $date = $splitdate[0];

                    $today = date("Y-m-d");

                    if ($today == $date) {

                    ?>

                       
                            <div class="row">
                                <div class="col-2 bg-primary pt-2 pb-2 text-end">
                                    <span class="fs-5 fw-bold text-white"><?php echo $tr["order_id"]; ?></span>
                                </div>
                                <?php
                                $product_details = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_id . "'");
                                $pd = $product_details->fetch_assoc();
                                ?>
                                <div class="col-6 col-lg-2 col-lg-3 bg-primary text-white pt-2 pb-2 text-center">
                                    <span class="fs-5 fw-bold"><?php echo $pd["title"]; ?></span>
                                </div>
                                <?php
                                $user_r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $tr["user_email"] . "' ");
                                $userd = $user_r->fetch_assoc();
                                ?>
                                <div class="col-4 col-lg-3 bg-primary pt-2 pb-2">
                                    <span class="fs-5 fw-bold text-white"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></span>
                                </div>
                                <div class="col-6 col-lg-2 bg-primary text-white pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold">Rs. <?php echo $pd["price"]; ?> .00</span>
                                </div>
                                <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold text-white"><?php echo $pd["qty"]; ?></span>
                                </div>
                            </div>
                        

            <?php

                    }
                }
            } else {
                echo "<h5 class = 'mt-4 mb-4 fw-bold text-center' style = 'color:brown;'> You haven't sell anything this day..  </h5>";
            }

            ?>





           
        </div>

        <!-- Search Product -->
        <div class="col-12 mb-2">
            <div class="row" id="product_div">



            </div>
        </div>
        <!-- Search Product -->



    </div>
    </div>

    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>
</body>

</html>