<?php
error_reporting(0);
require "connection.php";

$searchText = $_POST["t"];
$pageno = $_POST["p"];


$result_per_page = 9;

// echo $searchSelect;
// echo $searchText;
if (!empty($searchText)) {
    $textSearch = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $searchText . "%' AND `status_id`='1'");
    $ans = $textSearch->num_rows;
    $number_of_pages = ceil($ans / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $selectedrs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $searchText . "%' AND `status_id`='1' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n =  $selectedrs->num_rows;
} else if (empty($searchText)) {
    $textSearch = Database::search("SELECT * FROM `product` WHERE `status_id`='1'");
    $ans = $textSearch->num_rows;
    $number_of_pages = ceil($ans / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $selectedrs = Database::search("SELECT * FROM `product` AND `status_id`='1' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n =  $selectedrs->num_rows;
} else {
    $n = 0;
}
if ($n >= 1) {

?>

    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section mt-9 mb-9">
        <div class="container mt-9 mb-9">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-12">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->

                                    <div class="sort-tablist align-items-center ">


                                        <div class="col-2 input-group">

                                            <input type="text" class="form-control" placeholder="Search Products" id="headtext2">
                                            <button class="btn btn-dark text-white" onclick="headsearch2('1');">Search</button>

                                        </div>
                                        <!-- Start Page Amount -->
                                        <div class="page-amount ml-2 mt-5">
                                            <span>Showing 1–<?php echo $ans ?> of <?php echo $n ?> results</span>
                                        </div> <!-- End Page Amount -->
                                    </div> <!-- End Sort tab Button -->






                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                            <div class="row">

                                                <?php


                                                while ($p = $selectedrs->fetch_assoc()) {

                                                    # code...
                                                ?>
                                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
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

                                                                    <a href="#" class="image-link">
                                                                        <img src="images/product_img/<?php echo $ar[0]; ?>" alt="">
                                                                        <img src="images/product_img/<?php echo $ar[1]; ?>" alt="">
                                                                    </a>
                                                                    <div class="action-link">
                                                                        <div class="action-link-left">
                                                                            <input class="d-none" type="number" value="1" id="qtyinput<?php echo $p["id"] ?>">
                                                                            <a href="#" onclick="addtocart(<?php echo $p['id'] ?>);" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add to Cart</a>
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
                                                        <li> <a class="ion-ios-skipbackward" <?php

                                                                                                if ($pageno <= 1) {
                                                                                                    echo "#";
                                                                                                } else {
                                                                                                ?> onclick="basicsearch('<?php echo ($pageno - 1) ?>');" <?php
                                                                                                                                                            }

                                                                                                                                                                ?>></a></li>

                                                        <?php

                                                        for ($page = 1; $page <= $number_of_pages; $page++) {

                                                            if ($page == $pageno) {
                                                        ?>
                                                                <li> <a onclick="basicsearch('<?php echo $page ?>');" class="active"><?php echo $page; ?></a></li>
                                                            <?php
                                                            } else {
                                                            ?>

                                                                <li><a onclick="basicsearch('<?php echo $page ?>');"><?php echo $page; ?></a></li>

                                                        <?php
                                                            }
                                                        }

                                                        ?>
                                                        <li><a <?php

                                                                if ($pageno >= $number_of_pages) {
                                                                    echo "#"; ?> class="ion-ios-skipforward" <?php
                                                                                                                } else {
                                                                                                                    ?> onclick="basicsearch('<?php echo ($pageno + 1) ?>');" class="ion-ios-skipforward" <?php
                                                                                                                                                                                                        }

                                                                                                                                                                                                            ?>></a></li>
                                                        <ul>
                                                </div>










                                            <?php
                                        } else {
                                            ?>
                                                <div class="col-12 bg-light ms-2 mt-5 mb-5" style="margin-left: auto; margin-right: auto;">
                                                    <h3 class="text-center">No Results in your Searching...</h3>
                                                </div>
                                            <?php

                                        }
                                            ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Tab Wrapper -->

                        </div> <!-- End Shop Product Sorting Section  -->
                    </div>
                </div>
            </div> <!-- ...:::: End Shop Section:::... -->


            <!-- Start Modal Add cart -->
            <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <div class="modal-add-cart-info"><i class="fa fa-warning"></i>Please Check Your Cart.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="cart.php" class="btn btn-black-default-hover">Goto Cart</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Modal Add cart -->

            <!-- material-scrolltop button -->
            <button class="material-scrolltop" type="button"></button>