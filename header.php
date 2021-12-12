<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <style>
        @media screen and (min-width: 768px) {

            .mls {
                margin-left: 100px;
            }
        }
    </style>
</head>

<body>
    <!-- Start Header Area -->
    <header class="header-section">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo d-none d-lg-block">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/images/logo/logo_black.png" alt="" width="50" height="50"></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--golden">
                                <nav class="mls">
                                    <ul>
                                        <li>
                                            <a class="active main-menu-link" href="index.php">Home</a>

                                        </li>
                                        <li class="active main-menu-link">
                                            <a href="shop.php">Shop </a>
                                        </li>
                                        <li>
                                            <a href="about.php">About Us</a>
                                        </li>
                                        <li>
                                            <a href="contact.php">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="track.php">Track Order</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link d-inline d-lg-flex">

                                <li>
                                    <a href="#search" class="offcanvas-toggle">

                                        <i class="icon-magnifier"></i>


                                    </a>
                                    &nbsp;
                                </li>

                                <li>
                                    <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                        <a href="wishlist.php">
                                            <i class="icon-heart" title="Your Wishlist"></i>

                                            <span class="item-count" id="wish">

                                            </span>

                                        </a>

                                    </a>

                                </li>
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <a href="purchasehistory.php">
                                            <i class="icon-book-open" title="Your Transaction History"></i>

                                            <span class="item-count" id="purchauto">

                                            </span>

                                        </a>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <a href="cart.php">
                                            <i class="icon-bag" title="Your Cart"></i>

                                            <span class="item-count" id="cartauto">

                                            </span>

                                        </a>
                                    </a>
                                </li>

                                <li>
                                    <a class="offcanvas-rightside offcanvas-toggle">
                                        <a href="account.php" class="icon-user" title="Your Profile"></a>
                                    </a>
                                </li>


                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Offcanvas Search Bar Section -->
        <div id="search" class="search-modal">
            <button type="button" id="close" class="close">×</button>
            <div>
                <input type="search" id="headtext" placeholder="type keyword(s) here" />
                <button onclick="headsearch('1');" class="btn btn-lg btn-golden">Search</button>
            </div>
        </div>
        
        <!-- End Offcanvas Search Bar Section -->
    </header>
    <script src="load.js"></script>
    
    <!-- Start Header Area -->
</body>

</html>