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
        <link rel="stylesheet" href="bootstrap.css">


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
                        <a href="manageusers.php"> <i class="fa fa-user"></i>Manage Users</a>
                    </li>
                    <li>
                        <a href="sellerproductview.php">
                            <i class="fa fa-files-o"></i>Manage Products</a>

                    </li>
                    <li class="active">
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





                    <div class="container-fluid text-white fw-light">
                        <div class="row gy-3">


                            <div class="xa" id="pbox">


                                <!-- category,brand,model -->

                                <div class="col-lg-12">
                                    <div class="row">

                                        <!-- Product Category Select -->

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Select Product Category</label>
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select bg-dark text-white" id="ca">
                                                        <option value="0">Select Category</option>

                                                        <!-- Category connection -->

                                                        <?php

                                                        $r = Database::search("SELECT * FROM `category`");
                                                        $n = $r->num_rows;
                                                        for ($x = 0; $x < $n; $x++) {
                                                            $category = $r->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>

                                                        <?php
                                                        }
                                                        ?>

                                                        <!-- Category connection -->

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Category Select -->

                                        <!-- Product Brand Select -->

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Select Product Brand</label>
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select bg-dark text-white" id="br">
                                                        <option value="0">Select Brands</option>

                                                        <!-- brands connection -->

                                                        <?php

                                                        $r = Database::search("SELECT * FROM `brand`");
                                                        $n = $r->num_rows;
                                                        for ($x = 0; $x < $n; $x++) {
                                                            $brand = $r->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $brand["id"]; ?>"><?php echo $brand["name"]; ?></option>

                                                        <?php
                                                        }
                                                        ?>

                                                        <!-- brands connection -->

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Brand Select -->

                                        <!-- Product Model Select -->

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Select Product Model</label>
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select bg-dark text-white" id="mo">
                                                        <option value="0">Select Model</option>

                                                        <!-- Model connection -->

                                                        <?php

                                                        $r = Database::search("SELECT * FROM `model`");
                                                        $n = $r->num_rows;
                                                        for ($x = 0; $x < $n; $x++) {
                                                            $model = $r->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $model["id"]; ?>"><?php echo $model["name"]; ?></option>

                                                        <?php
                                                        }
                                                        ?>

                                                        <!-- Model connection -->

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Model Select -->

                                    </div>
                                </div>

                                <!-- category,brand,model -->

                                <!-- break -->
                                <hr class="line-break-1" />
                                <!-- break -->

                                <!-- title  -->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="" class="form-label label-head fw-bold">Add a title to your product</label>
                                        </div>
                                    </div>
                                    <div class="offset-lg-2 col-12 col-lg-8">
                                        <input class="form-control bg-dark text-white" type="text" id="ti">
                                    </div>
                                </div>
                                <!-- title -->

                                <!-- condition,color,qty -->

                                <!-- condition -->
                                <div class="col-12">
                                    <div class="row">

                                        <!-- condition -->
                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Select Product Condition</label>
                                                </div>

                                                <div class="form-check offset-1 offset-lg-1 col-10 col-lg-3 ms-5">
                                                    <input class="form-check-input bg-dark text-white" type="radio" name="condition" id="bn" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        BrandNew
                                                    </label>
                                                </div>
                                                <div class="form-check offset-1 offset-lg-1 col-10 col-lg-3 ms-5">
                                                    <input class="form-check-input bg-dark text-white" type="radio" name="condition" id="us">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Used
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- condition -->

                                        <!-- color -->

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Select Product Colour</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                            <input class="form-check-input bg-dark text-white" type="radio" name="color" value="gold" id="clr1" checked>
                                                            <label class="form-check-label" for="color1">
                                                                Gold
                                                            </label>
                                                        </div>

                                                        <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                            <input class="form-check-input bg-dark text-white" type="radio" name="color" value="silver" id="clr2">
                                                            <label class="form-check-label" for="color2">
                                                                Silver
                                                            </label>
                                                        </div>

                                                        <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                            <input class="form-check-input bg-dark text-white" type="radio" name="color" value="graphite" id="clr3">
                                                            <label class="form-check-label" for="color3">
                                                                Graphite
                                                            </label>
                                                        </div>

                                                        <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                            <input class="form-check-input bg-dark text-white" type="radio" name="color" value="pacific blue" id="clr4">
                                                            <label class="form-check-label" for="color4">
                                                                Pacific Blue
                                                            </label>
                                                        </div>

                                                        <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                            <input class="form-check-input bg-dark text-white" type="radio" name="color" value="jet black" id="clr5">
                                                            <label class="form-check-label" for="color4">
                                                                Jet Black
                                                            </label>
                                                        </div>

                                                        <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                            <input class="form-check-input bg-dark text-white" type="radio" name="color" value="rose gold" id="clr6">
                                                            <label class="form-check-label" for="color5">
                                                                Rose Gold
                                                            </label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- color -->


                                        <!-- product qty -->

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Select Product Quantity</label>
                                                    <input type="number" class="form-control bg-dark text-white" min="0" value="0" id="qty">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product qty -->
                                    </div>
                                </div>

                                <!-- condition,color,qty -->

                                <!-- break -->
                                <hr class="line-break-1" />
                                <!-- break -->

                                <!-- cost,payment -->

                                <!-- cost per item -->

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Cost Per Item</label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control bg-dark text-white" aria-label="Amount (to the nearest Rupee)" id="cost">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- cost per item -->

                                        <!-- payment -->
                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Approved Payment Methods</label>
                                                </div>
                                                <div class="col-10 offset-2">
                                                    <div class="row">

                                                        <div class=" col-3 payment-1"></div>
                                                        <div class=" col-3 payment-2"></div>
                                                        <div class=" col-3 payment-3"></div>
                                                        <div class=" col-3 payment-4"></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- payment -->
                                    </div>
                                </div>
                                <!-- cost,payment -->

                                <!-- break -->
                                <hr class="line-break-1" />
                                <!-- break -->

                                <!-- delivery cost -->
                                <div class="col-12">
                                    <label class="form-label label-head fw-bold">Delivery Cost</label>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-lg-6">
                                        <div class="row">

                                            <div class="offset-lg-1 col-12 col-lg-3">
                                                <label class="form-label">Delivery cost within Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-7">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control bg-dark text-white" aria-label="Amount (to the nearest Rupee)" id="dwc" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="offset-lg-1 col-12 col-lg-3">
                                                <label class="form-label">Delivery cost out of Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-7">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control bg-dark text-white" aria-label="Amount (to the nearest Rupee)" id="doc" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delivery cost -->

                                <!-- break -->
                                <hr class="line-break-1" />
                                <!-- break -->
                                <div class="col-12">
                                    <div class="row">
                                        <!-- heading -->
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Heading</label>
                                                </div>
                                                <div class="col-12">
                                                    <textarea class="form-control text-area-back bg-dark text-white" cols="100" rows="20" id="head"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- heading -->

                                        <!-- description -->
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label label-head fw-bold">Product Description</label>
                                                </div>
                                                <div class="col-12">
                                                    <textarea class="form-control text-area-back bg-dark text-white" cols="100" rows="20" id="desc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- description -->
                                </div>


                                <!-- break -->
                                <hr class="line-break-1" />
                                <!-- break -->

                                <!-- product img -->

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label label-head fw-bold">Add Product Image</label>
                                        </div>
                                        <span class="text-lg-start">Please select 4 images</span>
                                        <img class="col-5 col-lg-2 ms-2 productimg img-thumbnail bg-dark" src="assets/images/svgs/addproductimg.svg" id="prev" />
                                        <img class="col-5 col-lg-2 ms-2 productimg img-thumbnail bg-dark" src="assets/images/svgs/addproductimg.svg" id="prev1" />
                                        <img class="col-5 col-lg-2 ms-2 productimg img-thumbnail bg-dark" src="assets/images/svgs/addproductimg.svg" id="prev2" />
                                        <img class="col-5 col-lg-2 ms-2 productimg img-thumbnail bg-dark" src="assets/images/svgs/addproductimg.svg" id="prev3" />
                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-10 col-lg-6 ms-2 mt-2">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <input type="file" accept="image/*" class="d-none" id="imguploader" multiple />
                                                            <label class="btn btn-primary col-6 col-lg-8" for="imguploader" onclick="changeImg1();">Upload</label>
                                                        </div>
                                                        <!-- <div class="col-6 col-lg-4 d-grid mt-2 mt-lg-0">
                                       <button class="btn btn-primary">Upload</button>
                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <!-- product img -->

                                <!-- break -->
                                <hr class="line-break-1" />
                                <!-- break -->

                                <!-- notice -->
                                <div class="col-12">
                                    <label class="form-label label-head">Notice...</label>
                                    <br />
                                    <label class="form-label">We are taking 5% of the product price from every product as a service charge.</label>
                                </div>
                                <!-- notice -->

                                <div class="col-12 mb-5 mt-4">
                                    <div class="row">
                                        <div class="offset-0 col-12 offset-lg-4 col-lg-4 d-grid ">
                                            <button class="btn btn-danger searchbtn mb-3" onclick="addProduct();">Add Product</button>
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