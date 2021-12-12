<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>MintStore | Shop</title>

    <link rel="icon" href="assets/images/logo/main.png" />

    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>

<body>
    <?php

    require "header.php";

    ?>

    <div id="load">
        <!-- ...:::: Start Shop Section:::... -->
        <div class="shop-section mt-9 mb-9">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-3">
                        <!-- Start Sidebar Area -->
                        <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">CATEGORIES</h6>
                                <div class="sidebar-content">
                                    <ul class="sidebar-menu">
                                        <?php

                                        $category = Database::search("SELECT * FROM `category`");
                                        $cr = $category->num_rows;

                                        for ($e = 0; $e < $cr; $e++) {
                                            $c = $category->fetch_assoc();
                                        ?>

                                            <input type="checkbox" hidden name="cat" id="<?php echo $c['id']; ?>" onclick="categorysearch(<?php echo $c['id']; ?>);" />
                                            <label style="font-weight: 700; color: #1A1A19; cursor: pointer;" for="<?php echo $c['id']; ?>"><?php echo $c["name"]; ?></label>
                                            <div style="height: 14px;"></div>
                                        <?php
                                        }

                                        ?>


                                    </ul>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">FILTER BY PRICE</h6>
                                <div class="sidebar-content">
                                    <div id="slider-range" onclick="fullfilter();"></div>
                                    <div class="row">
                                        <label class="col-6">Price range (Rs):</label>

                                        <input type="text" id="amount" class="col-6">
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Sidebar Widget -->

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">Select By Brand</h6>
                                <div class="sidebar-content">
                                    <div class="filter-type-select">
                                        <ul>
                                            <?php
                                            $brand = Database::search("SELECT * FROM `brand`;");
                                            $br = $brand->num_rows;

                                            for ($n = 0; $n < $br; $n++) {
                                                $b = $brand->fetch_assoc();
                                            ?>
                                                <li>
                                                    <label class="checkbox-default" for="brakeParts">
                                                        <input type="radio" name="brand" id="brand<?php echo $b["id"] ?>" value="<?php echo $b["id"] ?>" onclick="fullfilter(<?php echo $b['id'] ?>);" onchange="allfilteronce(<?php echo $b['id'] ?>);">

                                                        <span><?php echo $b["name"] ?></span>
                                                    </label>
                                                </li>
                                            <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">SELECT BY CONDITION</h6>
                                <div class="sidebar-content">
                                    <div class="filter-type-select">
                                        <ul>

                                            <li>
                                                <label class="checkbox-default" for="brakeParts">
                                                    <input type="radio" name="condition" id="cond1" value="1" onclick="fullfilter();allfilteronce();">

                                                    <span>Brandnew</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="brakeParts">
                                                    <input type="radio" name="condition" id="cond2" value="2" onclick="fullfilter();allfilteronce();">

                                                    <span>Used</span>
                                                </label>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Sidebar Widget -->
                            <div class="col-12">
                                <a href="shop.php" class="btn btn-golden col-12">Clear Filters</a>
                            </div>



                        </div> <!-- End Sidebar Area -->
                    </div>
                    <div class="col-lg-9">
                        <!-- Start Shop Product Sorting Section -->
                        <div class="shop-sort-section">
                            <div class="container">
                                <div class="row">
                                    <!-- Start Sort Wrapper Box -->
                                    <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up" data-aos-delay="0">
                                        <!-- Start Sort tab Button -->
                                        <div class="sort-tablist d-flex align-items-center col-8">
                                            <ul class="tablist nav sort-tab-btn">
                                                <li><a class="nav-link " data-bs-toggle="tab" href="#layout-3-grid"><img src="assets/images/icons/bkg_grid.png" alt=""></a></li>

                                            </ul>

                                            <!-- Start Page Amount -->

                                            <div class="col-11 d-flex input-group">

                                                <input type="text" class="form-control" placeholder="Search Products" id="basic_search_txt">
                                                <button class="btn btn-dark text-white" onclick="basicsearch('1');">Search</button>

                                            </div> <!-- End Page Amount -->
                                        </div> <!-- End Sort tab Button -->

                                        <!-- Start Sort Select Option -->
                                        <div class="sort-select-list d-flex align-items-center">
                                            <label class="mr-2">Sort By:</label>
                                            <form action="#">
                                                <fieldset>
                                                    <select name="speed" id="sort" onchange="sortby('1');" aria-placeholder="Sorting Method">
                                                        <option hidden value="0">Sorting Method</option>

                                                        <option value="1">Newness</option>
                                                        <option value="2">In Stock</option>
                                                        <option value="3">Out of Stock</option>
                                                        <option value="4">Price:Low - High</option>
                                                        <option value="5">Price:High - Low</option>
                                                        <option value="6">Qty:Low - High</option>
                                                        <option value="7">Qty:High - Low</option>

                                                    </select>
                                                </fieldset>
                                            </form>
                                        </div> <!-- End Sort Select Option -->



                                    </div> <!-- Start Sort Wrapper Box -->
                                </div>
                            </div>
                        </div> <!-- End Section Content -->

                        <!-- Start Tab Wrapper -->
                        <div class="sort-product-tab-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="tab-content tab-animate-zoom">
                                            <!-- Start Grid View Product -->
                                            <?php

                                            if (isset($_GET["page"])) {
                                                $pageno = $_GET["page"];
                                            } else {
                                                $pageno = 1;
                                            }
                                            ?>
                                            <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                                <div class="row" id="searchdetails">


                                                    <?php

                                                    $productrs = Database::search("SELECT * FROM `product` WHERE `status_id` = '1'");
                                                    $d = $productrs->num_rows;

                                                    $result_per_page = 9;

                                                    $number_of_pages = ceil($d / $result_per_page);

                                                    $page_first_result = ((int)$pageno - 1) * $result_per_page;

                                                    $productwl = Database::search("SELECT * FROM `product` WHERE `status_id` = '1' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . ";");
                                                    $result = $productwl->num_rows;

                                                    while ($p = $productwl->fetch_assoc()) {

                                                        # code...
                                                    ?>
                                                        <div class="col-xl-4 col-sm-6 col-12" id="searchdetails">
                                                            <?php

                                                            if ((int)$p["qty"] > 0) {

                                                            ?>
                                                                <!-- Start Product Default Single Item -->
                                                                <div class="product-default-single-item product-color--golden" data-aos="fade-up" data-aos-delay="0">
                                                                    <div class="image-box img-fluid" style="height: 260px;">
                                                                        <?php

                                                                        $pimgs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $p["id"] . "'");
                                                                        $pcs = $pimgs->num_rows;

                                                                        for ($n = 0; $n < $pcs; $n++) {
                                                                            $imgrow = $pimgs->fetch_assoc();
                                                                            $ar[$n] = $imgrow["code"];
                                                                        }

                                                                        ?>

                                                                        <a href="<?php echo "singleproductview.php?id=" . ($p['id']) ?>" class="image-link">
                                                                            <img src="images/product_img/<?php echo $ar[0]; ?>" alt="">
                                                                            <img src="images/product_img/<?php echo $ar[1]; ?>" alt="">
                                                                        </a>
                                                                        <div class="action-link">
                                                                            <div class="action-link-left">
                                                                                <input class="d-none" type="number" value="1" id="qtyinput<?php echo $p["id"] ?>">
                                                                                <a href="#" onclick="addtoshopcart(<?php echo $p['id'] ?>);">Add to Cart</a>
                                                                            </div>
                                                                            <div class="action-link-right">
                                                                                <a href="<?php echo "singleproductview.php?id=" . ($p['id']) ?>" data-bs-toggle="modal"><i class="icon-magnifier"></i></a>
                                                                                <a href="#" onclick="addToWatchlist(<?php echo $p['id'] ?>);"><i class="icon-heart"></i></a>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="content">
                                                                        <div class="content-left">
                                                                            <h6 class="title"><a href="#"><?php echo $p["title"] ?></a></h6>


                                                                            <span class="text-primary font-weight-bold">In Stock</span>


                                                                        </div>
                                                                        <div class="content-right">
                                                                            <span class="price">Rs.<?php echo $p["price"] ?>.00</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <!-- End Product Default Single Item -->
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <!-- Start Product Default Single Item -->
                                                                <div class="product-default-single-item product-color--golden" data-aos="fade-up" data-aos-delay="0">
                                                                    <div class="image-box img-fluid" style="height: 260px;">
                                                                        <?php

                                                                        $pimgs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $p["id"] . "'");
                                                                        $pcs = $pimgs->num_rows;

                                                                        for ($n = 0; $n < $pcs; $n++) {
                                                                            $imgrow = $pimgs->fetch_assoc();
                                                                            $ar[$n] = $imgrow["code"];
                                                                        }

                                                                        ?>

                                                                        <a href="#" class="image-link">
                                                                            <img src="images/product_img/<?php echo $ar[0]; ?>" alt="">
                                                                            <img src="images/product_img/<?php echo $ar[1]; ?>" alt="">
                                                                        </a>
                                                                        <div class="action-link">
                                                                            <div class="action-link-left">
                                                                                <a href="#">Add to Cart</a>
                                                                            </div>
                                                                            <div class="action-link-right">
                                                                                <a href="<?php echo "singleproductview.php?id=" . ($p['id']) ?>" data-bs-toggle="modal"><i class="icon-magnifier"></i></a>
                                                                                <a href="#" onclick="addToWatchlist(<?php echo $p['id'] ?>);"><i class="icon-heart"></i></a>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="content">
                                                                        <div class="content-left">
                                                                            <h6 class="title"><a href="#"><?php echo $p["title"] ?></a></h6>



                                                                            <span class="text-danger font-weight-bold">Out of Stock</span>

                                                                        </div>
                                                                        <div class="content-right">
                                                                            <span class="price">Rs.<?php echo $p["price"] ?>.00</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <!-- End Product Default Single Item -->

                                                            <?php
                                                            }

                                                            ?>
                                                        </div>
                                                    <?php
                                                    }

                                                    ?>





                                                    <!-- Start Pagination -->
                                                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                                                        <ul>
                                                            <li><a class="ion-ios-skipbackward" href="<?php if ($pageno <= 1) {
                                                                                                            echo "#";
                                                                                                        } else {
                                                                                                            echo "?page=" . ($pageno - 1);
                                                                                                        }
                                                                                                        ?>"></a></li>


                                                            <?php
                                                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                                                if ($page == $pageno) {
                                                            ?>
                                                                    <li><a class="active" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                                                    <li>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <li> <a href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                                                    <li>
                                                                <?php
                                                                }
                                                            }
                                                                ?>




                                                                    <li><a href="<?php
                                                                                    if ($pageno >= $number_of_pages) {
                                                                                        echo "#";
                                                                                    } else {
                                                                                        echo "?page=" . ($pageno + 1);
                                                                                    }
                                                                                    ?>"><i class="ion-ios-skipforward"></i></a></li>
                                                        </ul>
                                                    </div> <!-- End Pagination -->


                                                </div>



                                            </div>
                                        </div> <!-- End List View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>






                    </div> <!-- End Tab Wrapper -->



                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->

    <!-- Modal -->
    <div class="modal fade" id="md" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cart Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="inner">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Close</button>
                    <a href="cart.php" class="btn btn-golden">See Cart</a>
                </div>
            </div>
        </div>
    </div>

      <!-- Modal -->
      <div class="modal fade" id="wd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cart Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="inner2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Close</button>
                    <a href="cart.php" class="btn btn-golden">See Cart</a>
                </div>
            </div>
        </div>
    </div>
    <?php

    require "footer.php";

    ?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>




    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="script.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>



</html>