<?php

session_start();

require "connection.php";



if (isset($_GET["id"])) {
    $pid = $_GET["id"];

    $products = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
    $pn = $products->num_rows;

    if ($pn == 1) {
        $pd = $products->fetch_assoc();


?>
        <!DOCTYPE html>
        <html lang="en">


        <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />


            <title>Mintstore | Product View</title>

            <link rel="icon" href="assets/images/logo/main.png" />


            <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
            <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
            <link rel="stylesheet" href="assets/css/style.min.css">

        </head>

        <body>

            <?php
            require "header.php";
            ?>


            <!-- Start Product Details Section -->
            <div class="product-details-section mt-9">
                <div class="container mt-9">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                                <!-- Start Large Image -->
                                <div class="product-large-image product-large-image-horaizontal swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $imagesrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                        $in = $imagesrs->num_rows;

                                        $img1;

                                        if (!empty($in)) {
                                            for ($x = 0; $x < $in; $x++) {
                                                $d = $imagesrs->fetch_assoc();

                                                if ($x == 0) {

                                                    $img1 = $d["code"];
                                                }
                                        ?>
                                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                                    <img src="images/product_img/<?php echo $d["code"]; ?>" alt="" height="465px">
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                                <img src="assets/images/svgs/empty.svg" alt="" height="465px">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- End Large Image -->
                                <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $thumbimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                        $tm = $thumbimg->num_rows;

                                        $imgt;

                                        if (!empty($tm)) {
                                            for ($y = 0; $y < $tm; $y++) {
                                                $t = $thumbimg->fetch_assoc();

                                                if ($y == 0) {

                                                    $imgt = $t["code"];
                                                }
                                        ?>
                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img class="img-fluid " src="images/product_img/<?php echo $t["code"]; ?>" alt="">
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid" src="assets/images/svgs/empty.svg" alt="">
                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </div>
                                </div>
                                <!-- End Thumbnail Image -->
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="product-details-content-area product-details--golden" data-aos="fade-up" data-aos-delay="200">
                                <!-- Start  Product Details Text Area-->
                                <div class="product-details-text">
                                    <h4 class="title"><?php echo $pd["title"]; ?></h4>
                                    <div class="d-flex align-items-center">

                                        <a href="#" class="icon-fire"></a>
                                        &nbsp;
                                        <a href="#" class="icon-screen-smartphone"></a>
                                    </div>
                                    <div><span class="price"> Rs.<?php echo $pd["price"]; ?>.00</span> <span class="text-danger" style="font-weight: bolder;"><del><?php $a = $pd["price"];
                                                                                                                                                                    $newval = ($a / 100) * 5;
                                                                                                                                                                    $val = $a + $newval;
                                                                                                                                                                    echo $val; ?>.00</del></span></div>


                                    <p><?php echo $pd["heading"] ?></p>
                                </div>
                                <!-- End  Product Details Text Area-->
                                <!-- Start Product Variable Area -->
                                <div class="product-details-variable">
                                    <h4 class="title">Available Options</h4>

                                    <h5><i class="fa fa-times"></i>&nbsp;<span style="font-weight: 600;">Condition:&nbsp;</span>

                                        <?php
                                        $condition = Database::search("SELECT * FROM `condition` WHERE `id` ='" . $pd["condition_id"] . "'");
                                        $cn = $condition->fetch_assoc();
                                        ?>
                                        <span class="text-primary" style="font-weight: 600;"><?php echo $cn["name"]; ?></span>
                                    </h5>
                                    <!-- Product Variable Single Item -->
                                    <div class="variable-single-item">
                                        <div class="product-stock"> <span class="product-stock-in"><i class="ion-checkmark-circled"></i></span>&nbsp;<?php echo $pd["qty"]; ?> IN STOCK</div>
                                    </div>
                                    <!-- Product Variable Single Item -->
                                    <div class="variable-single-item">
                                        <span>Color</span>
                                        <div class="product-variable-color">


                                            <?php

                                            $colurrs = Database::search("SELECT * FROM `color` WHERE `id`='" . $pd["color_id"] . "'");
                                            $coln = $colurrs->fetch_assoc();

                                            if (1 == $coln["id"]) {
                                            ?>
                                                <label for="product-color-golden">
                                                    <input name="product-color" id="1" class="color-select" type="checkbox" checked disabled>
                                                    <span class="product-color-golden" style="background-color: gold;"></span>
                                                </label>
                                            <?php
                                            } else {
                                            ?>
                                                <label for="product-color-golden">
                                                    <input name="product-color" id="1" class="color-select" type="checkbox">
                                                    <span class="product-color-golden" style="background-color: gold;"></span>
                                                </label>
                                            <?php
                                            }

                                            if (2 == $coln["id"]) {
                                            ?>
                                                <label for="product-color-silver">
                                                    <input name="product-color" id="2" class="color-select" type="checkbox" checked disabled>
                                                    <span class="product-color-silver" style="background-color: silver;"></span>
                                                </label>
                                            <?php
                                            } else {
                                            ?>
                                                <label for="product-color-silver">
                                                    <input name="product-color" id="2" class="color-select" type="checkbox">
                                                    <span class="product-color-silver" style="background-color: silver;"></span>
                                                </label>
                                            <?php
                                            }

                                            if (3 == $coln["id"]) {
                                            ?>
                                                <label for="product-color-graphite">
                                                    <input name="product-color" id="3" class="color-select" type="checkbox" checked disabled>
                                                    <span class="product-color-graphite" style="background-color: #4B4E53;"></span>
                                                </label>
                                            <?php
                                            } else {
                                            ?>
                                                <label for="product-color-graphite">
                                                    <input name="product-color" id="3" class="color-select" type="checkbox">
                                                    <span class="product-color-graphite" style="background-color: #4B4E53;"></span>
                                                </label>
                                            <?php
                                            }

                                            if (4 == $coln["id"]) {
                                            ?>

                                                <label for="product-color-blue">
                                                    <input name="product-color" id="4" class="color-select" type="checkbox" checked disabled>
                                                    <span class="product-color-blue" style="background-color: lightblue;"></span>
                                                </label>
                                            <?php
                                            } else {
                                            ?>
                                                <label for="product-color-blue">
                                                    <input name="product-color" id="4" class="color-select" type="checkbox">
                                                    <span class="product-color-blue" style="background-color: lightblue;"></span>
                                                </label>
                                            <?php
                                            }

                                            if (5 == $coln["id"]) {
                                            ?>
                                                <label for="product-color-black">
                                                    <input name="product-color" id="5" class="color-select" type="checkbox" checked disabled>
                                                    <span class="product-color-black" style="background-color: black;"></span>
                                                </label>
                                            <?php
                                            } else {
                                            ?>
                                                <label for="product-color-black">
                                                    <input name="product-color" id="5" class="color-select" type="checkbox">
                                                    <span class="product-color-black" style="background-color: black;"></span>
                                                </label>
                                            <?php
                                            }
                                            if (6 == $coln["id"]) {
                                            ?>
                                                <label for="product-color-rosegold">
                                                    <input name="product-color" id="6" class="color-select" type="checkbox" checked disabled>
                                                    <span class="product-color-rosegold" style="background-color: #B76E79;"></span>
                                                </label>
                                            <?php
                                            } else {
                                            ?>
                                                <label for="product-color-rosegold">
                                                    <input name="product-color" id="6" class="color-select" type="checkbox">
                                                    <span class="product-color-rosegold" style="background-color: #B76E79;"></span>
                                                </label>
                                            <?php
                                            }
                                            ?>





                                        </div>
                                    </div>





                                    <!-- Product Variable Single Item -->
                                    <div class="d-flex align-items-center ">
                                        <div class="variable-single-item ">
                                            <span>Quantity</span>
                                            <div class="product-variable-quantity">
                                                <input min="1" id="qtyinput<?php echo $pd["id"] ?>" max="100" value="1" type="number">
                                            </div>
                                        </div>

                                        <?php
                                        if ((int)$pd["qty"] > 0) {
                                        ?>
                                            <div class="product-add-to-cart-btn">
                                                <a href="#" onclick="addtocart(<?php echo $pd['id'] ?>);">+ Add To Cart</a>
                                                <a href="#" onclick="paynow(<?php echo $pid ?>);">&#9757;&nbsp; Buy Item &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                            </div>

                                        <?php
                                        } else {
                                        ?>
                                            <div class="product-add-to-cart-btn">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">+ Add To Cart</a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">&#9757;&nbsp; Buy Item &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- Start  Product Details Meta Area-->
                                    <div class="product-details-meta mb-20">
                                        <a href="#" onclick="addToWatchlist(<?php echo $pd['id'] ?>);" class="icon-space-right"><i class="icon-heart"></i>Add to
                                            wishlist</a>

                                    </div>
                                    <!-- End  Product Details Meta Area-->
                                </div>
                                <!-- End Product Variable Area -->

                                <!-- Start  Product Details Catagories Area-->
                                <div class="product-details-catagory mb-2">
                                    <span class="title">CATEGORIES:</span>
                                    <ul>
                                        <?php
                                        $cat = Database::search("SELECT * FROM `category` LIMIT 3");
                                        $crs = $cat->num_rows;

                                        for ($m = 0; $m < $crs; $m++) {
                                            $c = $cat->fetch_assoc();
                                        ?>
                                            <li><a class="text-uppercase"><?php echo $c["name"]; ?></a></li>

                                        <?php

                                        }

                                        ?>



                                    </ul>
                                </div>
                                <!-- End  Product Details Catagories Area-->


                                <!-- Start  Product Details Social Area-->
                                <div class="product-details-social">
                                    <span class="title">SHARE THIS PRODUCT:</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <!-- End  Product Details Social Area-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Section -->

            <!-- Start Product Content Tab Section -->
            <div class="product-details-content-tab-section section-top-gap-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                                <!-- Start Product Details Tab Button -->
                                <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                                    <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                            Description
                                        </a></li>
                                    <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                            <?php

                                            $fb = Database::search("SELECT * FROM `feedback` WHERE `product_id` = '" . $pd["id"] . "' ");
                                            $feedbacks = $fb->num_rows;

                                            ?>
                                            Feedbacks (<?php echo $feedbacks ?>)
                                        </a></li>
                                </ul> <!-- End Product Details Tab Button -->

                                <!-- Start Product Details Tab Content -->
                                <div class="product-details-content-tab">
                                    <div class="tab-content">
                                        <!-- Start Product Details Tab Content Singel -->
                                        <div class="tab-pane active show" id="description">
                                            <div class="single-tab-content-item">
                                                <?php

                                                echo $pd["description"];

                                                ?>
                                            </div>
                                        </div> <!-- End Product Details Tab Content Singel -->

                                        <!-- Start Product Details Tab Content Singel -->
                                        <div class="tab-pane" id="review">
                                            <div class="single-tab-content-item">
                                                <!-- Start - Review Comment -->
                                                <ul class="comment">
                                                    <?php

                                                    $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "'");
                                                    $feed = $feedbackrs->num_rows;

                                                    if ($feed == 0) {
                                                    ?>

                                                        <!-- Start - Review Comment list-->
                                                        <li class="comment-list">
                                                            <div class="comment-wrapper">

                                                                <h5>No Feedbacks Yet</h5>

                                                            </div>

                                                        </li> <!-- End - Review Comment list-->


                                                        <?php

                                                    } else {

                                                        for ($a = 0; $a < $feed; $a++) {
                                                            $feedrow = $feedbackrs->fetch_assoc();

                                                            $userrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $feedrow["user_email"] . "'");
                                                            $user = $userrs->fetch_assoc();
                                                        ?>

                                                            <!-- Start - Review Comment list-->
                                                            <li class="comment-list">
                                                                <div class="comment-wrapper">
                                                                    <div class="comment-img">
                                                                        <img src="assets/images/user/user.jpg" alt="">
                                                                    </div>
                                                                    <div class="comment-content">

                                                                        <div class="comment-content-top">
                                                                            <div class="comment-content-left">
                                                                                <h6 class="comment-name"><?php echo $user["fname"] . " " . $user["lname"]; ?></h6>

                                                                            </div>
                                                                            <div class="comment-content-right">
                                                                                <a href="#"><i class="fa fa-calendar"></i><?php echo $feedrow["date"] ?></a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="para-content">
                                                                            <p><?php echo $feedrow["feed"] ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </li> <!-- End - Review Comment list-->
                                                    <?php

                                                        }
                                                    }
                                                    ?>
                                                </ul> <!-- End - Review Comment -->
                                            </div>
                                        </div> <!-- End Product Details Tab Content Singel -->
                                    </div>
                                </div> <!-- End Product Details Tab Content -->

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Product Content Tab Section -->

            <!-- Start Product Default Slider Section -->
            <div class="product-default-slider-section section-top-gap-100 section-fluid">
                <!-- Start Section Content Text Area -->
                <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content-gap">
                                    <div class="secton-content">
                                        <h3 class="section-title">RELATED PRODUCTS</h3>
                                        <p>Browse the collection of our related products.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Section Content Text Area -->
                <div class="product-wrapper mb-9" data-aos="fade-up" data-aos-delay="0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-slider-default-1row default-slider-nav-arrow">
                                    <!-- Slider main container -->
                                    <div class="swiper-container product-default-slider-4grid-1row">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">

                                            <?php

                                            $brandid = Database::search("SELECT brand.id FROM product INNER JOIN model_has_brand ON model_has_brand.id=product.model_has_brand_id INNER JOIN images ON images.product_id=product.id INNER JOIN brand ON brand.id=model_has_brand.brand_id WHERE product.id='" . $pd["id"] . "';");
                                            $brandidrow = $brandid->fetch_assoc();

                                            $modelhasbran = Database::search("SELECT model_has_brand.id FROM model_has_brand WHERE model_has_brand.brand_id='" . $brandidrow["id"] . "'");
                                            $modeln = $modelhasbran->num_rows;

                                            for ($g = 0; $g < $modeln; $g++) {
                                                $model = $modelhasbran->fetch_assoc();

                                                $brandsid = Database::search("SELECT * FROM `product` WHERE `id` != '" . $pd["id"] . "' AND `model_has_brand_id`='" . $model["id"] . "' LIMIT 4");
                                                $brandsidn = $brandsid->num_rows;

                                                for ($k = 0; $k < $brandsidn; $k++) {
                                                    $bdf = $brandsid->fetch_assoc();
                                                    if (isset($bdf)) {


                                                        if ((int)$bdf["qty"] > 0) {
                                            ?>
                                                            <!-- Start Product Default Single Item -->
                                                            <div class="product-default-single-item product-color--golden swiper-slide">
                                                                <div class="image-box">
                                                                    <?php

                                                                    $pimgs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $bdf["id"] . "'");
                                                                    $pcs = $pimgs->num_rows;

                                                                    for ($n = 0; $n < $pcs; $n++) {
                                                                        $imgrs = $pimgs->fetch_assoc();
                                                                        $ar[$n] = $imgrs["code"];
                                                                    }

                                                                    ?>
                                                                    <a href="<?php echo "singleproductview.php?id=" . ($bdf['id']) ?>"" class=" image-link" style="height: 270px;">
                                                                        <img src="images/product_img/<?php echo $ar[0]; ?>" alt="">
                                                                        <img src="images/product_img/<?php echo $ar[1]; ?>" alt="">
                                                                    </a>

                                                                    <div class="action-link">
                                                                        <div class="action-link-left">
                                                                            <input class="d-none" type="number" value="1" id="qtyinput<?php echo $bdf["id"] ?>">
                                                                            <a href="#" onclick="addtocart(<?php echo $bdf['id'] ?>);">Add to Cart</a>
                                                                        </div>
                                                                        <div class="action-link-right">
                                                                            <a href="<?php echo "singleproductview.php?id=" . ($bdf['id']) ?>"><i class="icon-magnifier"></i></a>
                                                                            <a href="#" onclick="addToWatchlist(<?php echo $bdf['id'] ?>);"><i class="icon-heart"></i></a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="content">
                                                                    <div class="content-left">
                                                                        <h6 class="title"><a href="<?php echo "singleproductview.php?id=" . ($bdf['id']) ?>"><?php echo $bdf["title"] ?></a></h6>

                                                                        <span class="text-primary font-weight-bold">In Stock</span>

                                                                    </div>
                                                                    <div class="content-right">
                                                                        <span class="price">Rs.<?php echo $bdf["price"] ?>.00</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- End Product Default Single Item -->
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <!-- Start Product Default Single Item -->
                                                            <div class="product-default-single-item product-color--golden swiper-slide">
                                                                <div class="image-box">
                                                                    <?php

                                                                    $pimgs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $bdf["id"] . "'");
                                                                    $pcs = $pimgs->num_rows;

                                                                    for ($n = 0; $n < $pcs; $n++) {
                                                                        $imgrs = $pimgs->fetch_assoc();
                                                                        $ar[$n] = $imgrs["code"];
                                                                    }

                                                                    ?>
                                                                    <a href="<?php echo "singleproductview.php?id=" . ($bdf['id']) ?>" class=" image-link" style="height: 270px;">
                                                                        <img src="images/product_img/<?php echo $ar[0]; ?>" alt="">
                                                                        <img src="images/product_img/<?php echo $ar[1]; ?>" alt="">
                                                                    </a>

                                                                    <div class="action-link">
                                                                        <div class="action-link-left">

                                                                            <a href="#">Add to Cart</a>
                                                                        </div>
                                                                        <div class="action-link-right">
                                                                            <a href="<?php echo "singleproductview.php?id=" . ($bdf['id']) ?>"><i class="icon-magnifier"></i></a>
                                                                            <a href="#" onclick="addToWatchlist(<?php echo $bdf['id'] ?>);"><i class="icon-heart"></i></a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="content">
                                                                    <div class="content-left">
                                                                        <h6 class="title"><a href="<?php echo "singleproductview.php?id=" . ($bdf['id']) ?>"><?php echo $bdf["title"] ?></a></h6>

                                                                        <span class="text-danger font-weight-bold">Out of Stock</span>

                                                                    </div>
                                                                    <div class="content-right">
                                                                        <span class="price">Rs.<?php echo $bdf["price"] ?>.00</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- End Product Default Single Item -->

                                            <?php
                                                        }
                                                    }
                                                }
                                            }



                                            ?>





                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Default Slider Section -->

            <?php
            require "footer.php";
            ?>

            <!-- material-scrolltop button -->
            <button class="material-scrolltop" type="button"></button>

            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <!-- Start Modal Add cart -->
                <div class="modal fade" id="modalAddcart<?php echo $pd["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="modal-add-cart-product-img">
                                                        <?php
                                                        $cartimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pd["id"] . "' LIMIT 1");
                                                        $crt = $cartimg->num_rows;

                                                        for ($f = 0; $f < $crt; $f++) {
                                                            $cimg = $cartimg->fetch_assoc();
                                                        ?>
                                                            <img class="img-fluid" src="images/product_img/<?php echo $cimg["code"] ?>" alt="">
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart
                                                        successfully!</div>
                                                    <div class="modal-add-cart-product-cart-buttons">
                                                        <a href="cart.html">View Cart</a>
                                                        <a href="checkout.html">Checkout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 modal-border">
                                            <ul class="modal-add-cart-product-shipping-info">
                                                <li> <strong><i class="icon-shopping-cart"></i> There Are <?php
                                                                                                            $cartcount = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $_SESSION["user"]["email"] . "'");
                                                                                                            $row = $cartcount->num_rows;

                                                                                                            echo $row;
                                                                                                            ?> Items In Your
                                                        Cart.</strong></li>

                                                <li class="modal-continue-button"><a href="shop.php" data-bs-dismiss="modal">CONTINUE
                                                        SHOPPING</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Modal Add cart -->

            <?php
            } else {
            ?>
                <!-- Start Modal Add cart -->
                <div class="modal fade" id="notinses<?php echo $pd["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <div class="modal-add-cart-info"><i class="fa fa-warning"></i>Failed to add to cart. Signin or Signup First</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="Signin_and_signup.php" class="btn btn-black-default-hover">Go to Signin</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Modal Add cart -->
            <?php
            }
            ?>

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
                            <button type="button" class="btn btn-golden">See Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="wd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="inner2">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Close</button>
                            <a href="Signin_and_signup.php" class="btn btn-golden">Signin or Signup</a>
                        </div>
                    </div>
                </div>
            </div>





            <script src="assets/js/vendor/vendor.min.js"></script>
            <script src="assets/js/plugins/plugins.min.js"></script>
            <script src="script.js"></script>


            <!-- Main JS -->
            <script src="assets/js/main.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>


        </html>
<?php
    }
}
?>