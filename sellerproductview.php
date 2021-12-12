<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {

    $user = $_SESSION["a"];

    $pageno;
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
        <link rel="stylesheet" href="bootstrap.css" />



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
                                <strong class="text-danger fw-bold">Mint</strong><strong class="fw-bold">Store</strong>
                            </div>
                            <div class="brand-text brand-sm">
                                <strong class="text-danger fw-bold">M</strong><strong class="fw-bold">S</strong>
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
                        <a href="manageusers.php"> <i class="fa fa-user"></i>Manage Users </a>
                    </li>
                    <li class="active">
                        <a href="sellerproductview.php">
                            <i class="fa fa-files-o"></i>Manage Products
                        </a>
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




                    <div class="container-fluid">
                        <div class="row">


                            <div class="col-12">
                                <div class="row">

                                    <!--sorting-->
                                    <div class="col-11 col-lg-3 mt-3 mx-auto mx-lg-4 my-3 mb-3 rounded-3 bg-dark text-white fw-bolder border border-white shadow">
                                        <div class="row">
                                            <div class="col-12 mt-3 ms-3 fs-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold fs-3">Filters</label>
                                                    </div>
                                                    <div class="col-11">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="text" class="form-control" placeholder="Search" id="s">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <label class="form-label fw-bold">Active Time</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr width="80%" />
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input bg-danger" type="radio" name="flexRadioDefault1" id="n">
                                                            <label class="form-check-label" for="n">
                                                                Newer To Oldest
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input bg-danger" type="radio" name="flexRadioDefault1" id="o">
                                                            <label class="form-check-label" for="o">
                                                                Oldest To Newer
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <label class="form-label fw-bold">By Quantity</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr width="80%" />
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input bg-danger" type="radio" name="flexRadioDefault" id="l">
                                                            <label class="form-check-label" for="l">
                                                                Low To High
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input bg-danger" type="radio" name="flexRadioDefault" id="h">
                                                            <label class="form-check-label" for="h">
                                                                High To Low
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label class="form-label fw-bold">By Condition</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr width="80%" />
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input bg-danger" type="radio" name="flexRadioDefault2" id="b">
                                                            <label class="form-check-label" for="b">
                                                                Brand New
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input bg-danger" type="radio" name="flexRadioDefault2" id="u">
                                                            <label class="form-check-label" for="u">
                                                                Used
                                                            </label>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-10 offset-0 offset-lg-1 mt-3 mb-3">
                                                <div class="row gy-2">
                                                    <div class="col-12  d-grid">
                                                        <button class="btn btn-success fw-bold" onclick="addFilters(1);">Search</button>
                                                    </div>
                                                    <div class="col-12  d-grid">
                                                        <a href="sellerproductview.php" class="btn btn-danger">Clear Filters</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--sorting-->

                                    <!--product-->
                                    <div class="col-12 col-lg-8 my-3 bg-dark rounded-3 border border-white shadow">
                                        <div class="row">
                                            <div class=" col-12 text-center">
                                                <div class="row" id="product_view_div">

                                                    <?php

                                                    if (isset($_GET["page"])) {
                                                        $pageno = $_GET["page"];
                                                    } else {
                                                        $pageno = 1;
                                                    }


                                                    $product = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'");
                                                    $d = $product->num_rows;
                                                    $row = $product->fetch_assoc();

                                                    $result_per_page = 6;

                                                    $number_of_pages = ceil($d / $result_per_page);


                                                    $page_first_result = ((int)$pageno - 1) * $result_per_page;

                                                    $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "");
                                                    $srn = $selectedrs->num_rows;

                                                    while ($srow = $selectedrs->fetch_assoc()) {

                                                    ?>

                                                        <div class="card mb-3 col-12 col-lg-6 shadow" id="card<?php echo $srow['id']; ?>">
                                                            <div class="row">
                                                                <?php
                                                                $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $srow["id"] . "'");
                                                                $pir = $pimgrs->fetch_assoc();

                                                                ?>

                                                                <div class="col-md-4 mt-4">
                                                                    <img src="images/product_img/<?php echo $pir["code"]; ?>" class="img-fluid rounded-start">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"><?php echo $srow["title"]; ?></h5>
                                                                        <span class="card-text fw-bold text-primary">Rs. <?php echo $srow["price"]; ?>.00</span>
                                                                        <br />
                                                                        <span class="card-text fw-bold text-success"><?php echo $srow["qty"]; ?> items left</span>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" id="change<?php echo $srow['id'] ?>" onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php if ($srow["status_id"] == 2) {
                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                        } ?> />

                                                                            <label class="<?php if ($srow["status_id"] == 2) {
                                                                                                echo "form-check-label fw-bold text-info";
                                                                                            } else {
                                                                                                echo "form-check-label fw-bold text-danger";
                                                                                            } ?>" for="change<?php echo $srow['id'] ?>" id="checklabel<?php echo $srow['id']; ?>"><?php if ($srow["status_id"] == 2) {
                                                                                                                                                                                            echo "Make Your Product Active";
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo "Make Your Product Deactive";
                                                                                                                                                                                        } ?></label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="row gy-2">
                                                                                <div class="col-12 col-xl-6 d-grid">
                                                                                    <a href="#" class="btn btn btn-success" onclick="sendid(<?php echo $srow['id']; ?>)">Update</a>
                                                                                </div>
                                                                                <div class="col-12 col-xl-6 d-grid">
                                                                                    <a href="#" class="btn btn-danger" onclick="deletemodel(<?php echo $srow['id']; ?>);">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deletemodel<?php echo $srow['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fw-bolder text-warning" id="exampleModalLabel">Warning...</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are You Sure You Want To Delete This Product?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                                                        <button type="button" class="btn btn-danger" onclick="deleteproduct(<?php echo $srow['id'] ?>);">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php

                                                    }

                                                    ?>

                                                    <!--product-->

                                                    <!--pagination-->
                                                    <div class="col-4 mb-3 text-center offset-4" id="pro_view">

                                                        <div class="pagination">
                                                            <a class="text-white" href="<?php if ($pageno <= 1) {
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
                                                                    <a class="ms-1 text-white" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                                            <?php
                                                                }
                                                            }
                                                            ?>


                                                            <a class="text-white" href="<?php
                                                                                        if ($pageno >= $number_of_pages) {
                                                                                            echo "#";
                                                                                        } else {
                                                                                            echo "?page=" . ($pageno + 1);
                                                                                        }
                                                                                        ?>">&raquo;
                                                            </a>
                                                        </div>
                                                    </div>


                                                    <!--pagination-->

                                                </div>
                                            </div>

                                        </div>
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