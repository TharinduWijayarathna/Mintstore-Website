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
                    <li class="active">
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
                <div class="row mt-2">



                    <div class="container-fluid">
                        <div class="row">




                            <div class="col-12 mt-2">
                                <h3 class="text-primary">Manage Categories</h3>
                            </div>

                            <hr>

                            <div class="col-12 mb-3">
                                <div class="row g-1">

                                    <?php

                                    $categoryrs = Database::search("SELECT * FROM `category`");
                                    $num = $categoryrs->num_rows;

                                    for ($i = 0; $i < $num; $i++) {

                                        $row = $categoryrs->fetch_assoc();
                                    ?>



                                        <div class="col-12 col-lg-3">
                                            <div class="row g-1 px-1">
                                                <div class="col-12 text-center bg-body border border-2 border-success shadow rounded">
                                                    <label class="form-label fs-4 fw-bold py-3"><?php echo $row["name"] ?></label>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>

                                    <div class="col-12 col-lg-3">
                                        <div class="row g-1 px-1">
                                            <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                                <div class="row">

                                                    <div class="col-12" onclick="addnewmodal();">
                                                        <label class="form-label fs-4 fw-bold py-3 text-white"><i class="fa fa-plus-circle"></i> Add Category</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <h3 class="text-primary">Manage Brand</h3>
                            </div>

                            <hr>


                            <div class="col-12 mb-3">
                                <div class="row g-1">

                                    <?php

                                    $brandrs = Database::search("SELECT * FROM `brand`");
                                    $bnum = $brandrs->num_rows;

                                    for ($i = 0; $i < $bnum; $i++) {

                                        $brow = $brandrs->fetch_assoc();
                                    ?>



                                        <div class="col-12 col-lg-3">
                                            <div class="row g-1 px-1">
                                                <div class="col-12 text-center bg-body border border-2 border-success shadow rounded">
                                                    <label class="form-label fs-4 fw-bold py-3"><?php echo $brow["name"] ?></label>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>

                                    <div class="col-12 col-lg-3">
                                        <div class="row g-1 px-1">
                                            <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                                <div class="row">

                                                    <div class="col-12" onclick="addnewmodalbr();">
                                                        <label class="form-label fs-4 fw-bold py-3 text-white"><i class="fa fa-plus-circle"></i> Add Brand</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <h3 class="text-primary">Manage Modal</h3>
                            </div>

                            <hr>

                            <div class="col-12 mb-3">
                                <div class="row g-1">

                                    <?php

                                    $modelrs = Database::search("SELECT * FROM `model`");
                                    $mnum = $modelrs->num_rows;

                                    for ($i = 0; $i < $mnum; $i++) {

                                        $mrow = $modelrs->fetch_assoc();
                                    ?>



                                        <div class="col-12 col-lg-3">
                                            <div class="row g-1 px-1">
                                                <div class="col-12 text-center bg-body border border-2 border-success shadow rounded">
                                                    <label class="form-label fs-4 fw-bold py-3"><?php echo $mrow["name"] ?></label>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>

                                    <div class="col-12 col-lg-3">
                                        <div class="row g-1 px-1">
                                            <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                                <div class="row">

                                                    <div class="col-12" onclick="addnewmodalmd();">
                                                        <label class="form-label fs-4 fw-bold py-3 text-white"><i class="fa fa-plus-circle"></i> Add Model</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="col-12  tm-block-col mb-3">
                                <div class="tm-bg-primary-dark tm-block tm-block-products align-items-center">
                                    <h3 for="" class="text-primary">Link Products</h3>
                                    <b class="text-danger">You cannot add product without linking model, brand and category.</b>

                                    <div class="tm-product-table-container">
                                        <table class="table table-hover tm-table-small tm-product-table">
                                            <thead>
                                                <tr>


                                                    <th scope="col">Brand / Name</th>
                                                    <th scope="col">Model / Type</th>
                                                    <th scope="col">Link</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>


                                                    <td>
                                                        <select class="form-select btn btn-secondory fs-6 fw-bold bg-secondary text-dark col-12" id="brnselect">
                                                            <option value="0">Select Brand Name</option>

                                                            <?php
                                                            $Brandrs = Database::search("SELECT * FROM `brand`");
                                                            $Brandrsx = $Brandrs->num_rows;

                                                            for ($n = 0; $n < $Brandrsx; $n++) {
                                                                $bs = $Brandrs->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo $bs["id"] ?>"><?php echo $bs["name"]; ?></option>
                                                            <?php
                                                            }

                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select btn btn-secondory fs-6 fw-bold bg-secondary text-dark col-12" id="modSelect">
                                                            <option value="0">Select Model/Type</option>

                                                            <?php
                                                            $selectModel = Database::search("SELECT * FROM `model`");
                                                            $selectNum = $selectModel->num_rows;

                                                            for ($n = 0; $n < $selectNum; $n++) {
                                                                $selectModeldata = $selectModel->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo $selectModeldata["id"] ?>"><?php echo $selectModeldata["name"]; ?></option>
                                                            <?php
                                                            }

                                                            ?>

                                                        </select>
                                                    </td>

                                                    <td><button class="btn btn-primary col-12" onclick="linkItems();">Link Item</button></td>


                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- table container -->

                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="addnewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel">Add New Category</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="form-label">Category</label>
                                            <input type="text" class="form-control" id="categorytxt" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="savecategory();">Save Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="addnewmodalbr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel">Add New Brand</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="form-label">Category</label>
                                            <input type="text" class="form-control" id="brandtxt" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="savebrand();">Save Brand</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="addnewmodalmd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel">Add New Modal</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="form-label">Modal</label>
                                            <input type="text" class="form-control" id="modeltxt" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="savemodel();">Save Modal</button>
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