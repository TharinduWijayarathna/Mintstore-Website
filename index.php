<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mintstore | Home</title>

    <link rel="icon" href="assets/images/logo/main.png" />

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>

<body>

    <?php

    require "header.php";

    ?>



    <div id="load">
        <!-- Start Hero Slider Section-->
        <div class="hero-slider-section">
            <!-- Slider main container -->
            <div class="hero-slider-active swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Start Hero Single Slider Item -->
                    <div class="hero-single-slider-item swiper-slide">
                        <!-- Hero Slider Image -->
                        <div class="hero-slider-bg">
                            <img src="assets/images/hero-slider/home-1/hero-slider-1.jpg" alt="">
                        </div>
                        <!-- Hero Slider Content -->
                        <div class="hero-slider-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="hero-slider-content">
                                            <h4 class="subtitle font-italic">
                                                <?php
                                                if (isset($_SESSION["user"])) {

                                                ?>

                                                    Hello <?php echo $_SESSION["user"]["fname"] . " " . $_SESSION["user"]["lname"]; ?>
                                                <?php
                                                } else {
                                                ?>
                                                    Hi Welcome to Mintstore
                                                <?php
                                                }
                                                ?>

                                            </h4>
                                            <h2 class="title font-italic">Upto Premium<br>And Budget</h2>
                                            <a href="index.php" class="btn btn-lg btn-outline-golden font-italic">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Hero Single Slider Item -->
                    <!-- Start Hero Single Slider Item -->
                    <div class="hero-single-slider-item swiper-slide">
                        <!-- Hero Slider Image -->
                        <div class="hero-slider-bg">
                            <img src="assets/images/hero-slider/home-1/hero-slider-2.jpg" alt="">
                        </div>
                        <!-- Hero Slider Content -->
                        <div class="hero-slider-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="hero-slider-content">
                                            <h4 class="subtitle font-italic">On Your Choice</h4>
                                            <h2 class="title font-italic">High End<br> Devices </h2>
                                            <a href="index.php" class="btn btn-lg btn-outline-golden font-italic">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Hero Single Slider Item -->
                </div>

                <!-- If we need pagination -->
                <div class="swiper-pagination active-color-golden"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev d-none d-lg-block"></div>
                <div class="swiper-button-next d-none d-lg-block"></div>
            </div>
        </div>
        <!-- End Hero Slider Section-->

        <!-- Start Service Section -->
        <div class="service-promo-section section-top-gap-100">
            <div class="service-wrapper">
                <div class="container">
                    <div class="row">
                        <!-- Start Service Promo Single Item -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                                <div class="image">
                                    <img src="assets/images/icons/service-promo-1.png" alt="">
                                </div>
                                <div class="content">
                                    <h6 class="title">FREE SHIPPING</h6>
                                    <p>Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Service Promo Single Item -->
                        <!-- Start Service Promo Single Item -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="image">
                                    <img src="assets/images/icons/service-promo-2.png" alt="">
                                </div>
                                <div class="content">
                                    <h6 class="title">30 DAYS MONEY BACK</h6>
                                    <p>100% satisfaction guaranteed, or get your money back within 30 days!</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Service Promo Single Item -->
                        <!-- Start Service Promo Single Item -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="image">
                                    <img src="assets/images/icons/service-promo-3.png" alt="">
                                </div>
                                <div class="content">
                                    <h6 class="title">SAFE PAYMENT</h6>
                                    <p>Pay with the world’s most popular and secure payment methods.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Service Promo Single Item -->
                        <!-- Start Service Promo Single Item -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                                <div class="image">
                                    <img src="assets/images/icons/service-promo-4.png" alt="">
                                </div>
                                <div class="content">
                                    <h6 class="title">LOYALTY CUSTOMER</h6>
                                    <p>Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Service Promo Single Item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Service Section -->

        <!-- Start Product Default Slider Section -->
        <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
            <!-- Start Section Content Text Area -->
            <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-content-gap">
                                <div class="secton-content">
                                    <h3 class="section-title">Latest Arrived Devices</h3>
                                    <p>Our new arrived devices lineup</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Section Content Text Area -->
            <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-slider-default-1row default-slider-nav-arrow">
                                <!-- Slider main container -->
                                <div class="swiper-container product-default-slider-4grid-1row">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- End Product Default Single Item -->
                                        <?php

                                        $prs = Database::search("SELECT * FROM `product` WHERE `status_id`= '1' ORDER BY `datetime_added` DESC LIMIT 6");
                                        $nrs = $prs->num_rows;

                                        for ($m = 0; $m < $nrs; $m++) {
                                            $productrs = $prs->fetch_assoc();




                                            if ((int)$productrs["qty"] > 0) {
                                        ?>
                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden swiper-slide">
                                                    <div class="image-box">
                                                        <?php

                                                        $pimgs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $productrs["id"] . "'");
                                                        $pcs = $pimgs->num_rows;

                                                        for ($n = 0; $n < $pcs; $n++) {
                                                            $imgrs = $pimgs->fetch_assoc();
                                                            $ar[$n] = $imgrs["code"];
                                                        }

                                                        ?>
                                                        <a href="<?php echo "singleproductview.php?id=" . ($productrs['id']) ?>" class="image-link" style="height: 270px;">
                                                            <img src="images/product_img/<?php echo $ar[0]; ?>" alt="">
                                                            <img src="images/product_img/<?php echo $ar[1]; ?>" alt="">
                                                        </a>

                                                        <div class="action-link">
                                                            <div class="action-link-left">
                                                                <input class="d-none" type="number" value="1" id="qtyinput<?php echo $productrs["id"] ?>">
                                                                <a href="#" onclick="addtoshopcart(<?php echo $productrs['id'] ?>);">Add to Cart</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="<?php echo "singleproductview.php?id=" . ($productrs['id']) ?>"><i class="icon-magnifier"></i></a>
                                                                <a href="#" onclick="addToWatchlist(<?php echo $productrs['id'] ?>);"><i class="icon-heart"></i></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href="#"><?php echo $productrs["title"] ?></a></h6>

                                                            <span class="text-primary font-weight-bold">In Stock</span>

                                                        </div>
                                                        <div class="content-right">
                                                            <span class="price">Rs.<?php echo $productrs["price"] ?>.00</span>
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

                                                        $pimgs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $productrs["id"] . "'");
                                                        $pcs = $pimgs->num_rows;

                                                        for ($n = 0; $n < $pcs; $n++) {
                                                            $imgrs = $pimgs->fetch_assoc();
                                                            $ar[$n] = $imgrs["code"];
                                                        }

                                                        ?>
                                                        <a href="#" class="image-link" style="height: 270px;">
                                                            <img src="images/product_img/<?php echo $ar[0]; ?>" alt="">
                                                            <img src="images/product_img/<?php echo $ar[1]; ?>" alt="">
                                                        </a>

                                                        <div class="action-link">
                                                            <div class="action-link-left">

                                                                <a href="#">Add to Cart</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="<?php echo "singleproductview.php?id=" . ($productrs['id']) ?>"><i class="icon-magnifier"></i></a>
                                                                <a href="#" onclick="addToWatchlist(<?php echo $productrs['id'] ?>);"><i class="icon-heart"></i></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href="#"><?php echo $productrs["title"] ?></a></h6>

                                                            <span class="text-danger font-weight-bold">Out of Stock</span>

                                                        </div>
                                                        <div class="content-right">
                                                            <span class="price">Rs.<?php echo $productrs["price"] ?>.00</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- End Product Default Single Item -->

                                        <?php
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

        <!-- Start Banner Section -->
        <div class="banner-section section-top-gap-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-3 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="0">
                            <div class="image ">
                                <img class="img-fluid" src="assets\images\banner\banner1.png" alt="">
                            </div>
                            <div class="content">
                                <h3 class="title" style="color: #15D53B;">See our smart phone collection
                                </h3>
                                <h5 class="sub-title" style="color: #F37A2B;">We design your smartlife more beautiful</h5>
                                <a href="shop.php" class="btn btn-lg btn-black-default-hover icon-space-left"><span class="d-flex align-items-center">discover now <i class="ion-ios-arrow-thin-right"></i></span></a>
                            </div>
                        </div>
                        <!-- End Banner Single Item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Section -->

        <!-- Start Product Default Slider Section -->
        <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
            <!-- Start Section Content Text Area -->
            <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-content-gap">
                                <div class="secton-content">
                                    <h3 class="section-title">Premium Devices</h3>
                                    <p>These are our expensive devices lineup</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Section Content Text Area -->
            <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-slider-default-1row default-slider-nav-arrow">
                                <!-- Slider main container -->
                                <div class="swiper-container product-default-slider-4grid-1row">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- End Product Default Single Item -->
                                        <?php

                                        $pr = Database::search("SELECT * FROM `product` WHERE `status_id`= '1' AND `price` > 150000 ORDER BY `datetime_added` DESC LIMIT 7");
                                        $nr = $pr->num_rows;

                                        for ($x = 0; $x < $nr; $x++) {
                                            $product = $pr->fetch_assoc();


                                            if ((int)$product["qty"] > 0) {


                                        ?>

                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden swiper-slide">
                                                    <div class="image-box">
                                                        <?php

                                                        $pimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                                                        $pm = $pimg->num_rows;

                                                        for ($y = 0; $y < $pm; $y++) {
                                                            $imgrow = $pimg->fetch_assoc();
                                                            $arr[$y] = $imgrow["code"];
                                                        }

                                                        ?>
                                                        <a href="<?php echo "singleproductview.php?id=" . ($product['id']) ?>" class="image-link" style="height: 270px;">
                                                            <img src="images/product_img/<?php echo $arr[0]; ?>" alt="">
                                                            <img src="images/product_img/<?php echo $arr[1]; ?>" alt="">
                                                        </a>
                                                        <div class="action-link">
                                                            <div class="action-link-left">
                                                                <input class="d-none" type="number" value="1" id="qtyinput<?php echo $product["id"] ?>">
                                                                <a href="#" onclick="addtoshopcart(<?php echo $product['id'] ?>);" >Add to Cart</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="<?php echo "singleproductview.php?id=" . ($product['id']) ?>"><i class="icon-magnifier"></i></a>
                                                                <a href="#" onclick="addToWatchlist(<?php echo $product['id'] ?>);"><i class="icon-heart"></i></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href="#"><?php echo $product["title"]; ?></a></h6>

                                                            <span class="text-primary font-weight-bold">In Stock</span>

                                                        </div>
                                                        <div class="content-right">
                                                            <span class="price">Rs.<?php echo $product["price"]; ?>.00</span>
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

                                                        $pimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                                                        $pm = $pimg->num_rows;

                                                        for ($y = 0; $y < $pm; $y++) {
                                                            $imgrow = $pimg->fetch_assoc();
                                                            $arr[$y] = $imgrow["code"];
                                                        }

                                                        ?>
                                                        <a href="product-details-default.html" class="image-link" style="height: 270px;">
                                                            <img src="images/product_img/<?php echo $arr[0]; ?>" alt="">
                                                            <img src="images/product_img/<?php echo $arr[1]; ?>" alt="">
                                                        </a>
                                                        <div class="action-link">
                                                            <div class="action-link-left">

                                                                <a href="#">Add to Cart</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="<?php echo "singleproductview.php?id=" . ($product['id']) ?>"><i class="icon-magnifier"></i></a>
                                                                <a href="#" onclick="addToWatchlist(<?php echo $product['id'] ?>);"><i class="icon-heart"></i></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href="product-details-default.html"><?php echo $product["title"]; ?></a></h6>

                                                            <span class="text-danger font-weight-bold">Out of Stock</span>

                                                        </div>
                                                        <div class="content-right">
                                                            <span class="price">Rs.<?php echo $product["price"]; ?>.00</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- End Product Default Single Item -->

                                        <?php
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
                    <h5 class="modal-title" id="exampleModalLabel">Cart Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="inner2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-golden">See Cart</button>
                </div>
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


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>
</body>



</html>