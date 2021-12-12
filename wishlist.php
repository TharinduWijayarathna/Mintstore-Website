<?php

require "connection.php";

session_start();

if (isset($_SESSION["user"])) {
?>
    <!DOCTYPE html>
    <html lang="en">


    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Mintstore | Wishlist</title>

        <link rel="icon" href="assets/images/logo/main.png" />


        <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
        <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
        <link rel="stylesheet" href="assets/css/style.min.css">

    </head>

    <body>

        <?php
        require "header.php";

        if (isset($_SESSION["user"])) {

            $umail = $_SESSION["user"]["email"];

        ?>


            <div id="load">





                <!-- ...:::: Start Wishlist Section:::... -->
                <div class="wishlist-section mt-9 mb-9">
                    <!-- Start Cart Table -->
                    <div class="wishlish-table-wrapper" data-aos="fade-up" data-aos-delay="0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table_desc">
                                        <div class="table_page table-responsive">

                                            <?php
                                            $wishlistrs = Database::search("SELECT * FROM `wishlist` WHERE `user_email`='" . $umail . "'");
                                            $wn = $wishlistrs->num_rows;

                                            if ($wn == 0) {
                                            ?>

                                                <!-- ...::::Start About Us Center Section:::... -->
                                                <div class="empty-cart-section section-fluid mt-9 mb-9">
                                                    <div class="emptycart-wrapper">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                                                                    <div class="emptycart-content text-center">
                                                                        <div class="image">
                                                                            <img class="img-fluid" src="assets/images/emprt-cart/empty-cart.png" alt="">
                                                                        </div>
                                                                        <h4 class="title">Your Wishlist is Empty</h4>
                                                                        <h6 class="sub-title">Sorry Mate... No item Found inside your Wishlist!</h6>
                                                                        <a href="shop.php" class="btn btn-lg btn-golden">Continue Shopping</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- ...::::End  About Us Center Section:::... -->

                                            <?php
                                            } else {



                                            ?>
                                                <table>
                                                    <!-- Start Wishlist Table Head -->
                                                    <thead>
                                                        <tr>
                                                            <th class="product_remove">Delete</th>
                                                            <th class="product_thumb">Image</th>
                                                            <th class="product_name">Product</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-condition">Condition</th>
                                                            <th class="product_stock">Stock Status</th>
                                                            <th class="product_addcart">Add To Cart</th>
                                                        </tr>
                                                    </thead> <!-- End Cart Table Head -->
                                                    <?php
                                                    for ($i = 0; $i < $wn; $i++) {
                                                        $wr = $wishlistrs->fetch_assoc();
                                                        $wid = $wr["product_id"];

                                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $wid . "'");
                                                        $pn = $productrs->num_rows;
                                                        if ($pn == 1) {
                                                            $pr = $productrs->fetch_assoc();
                                                            $prodid = $pr["id"];

                                                    ?>
                                                            <tbody>
                                                                <!-- Start Wishlist Single Item-->
                                                                <tr>
                                                                    <td class="product_remove"><a href="#" onclick="deleteformwatchlist(<?php echo $wr['id']; ?>);"><i class="fa fa-trash-o"></i></a></td>
                                                                    <?php
                                                                    $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $prodid . "'");
                                                                    $in = $imagers->num_rows;
                                                                    $arr;
                                                                    for ($x = 0; $x < $in; $x++) {
                                                                        $ir = $imagers->fetch_assoc();
                                                                        $arr[$x] = $ir["code"];
                                                                    }
                                                                    ?>
                                                                    <td class="product_thumb"><a href="product-details-default.html"><img src="images/product_img/<?php echo $arr[0]; ?>" alt=""></a></td>
                                                                    <td class="product_name"><a href="product-details-default.html"><?php echo $pr["title"]; ?></a></td>
                                                                    <td class="product-price">Rs.<?php echo $pr["price"] ?>.00</td>
                                                                    <?php
                                                                    $condition = Database::search("SELECT * FROM `condition` WHERE `id`='" . $pr["condition_id"] . "'");
                                                                    $con = $condition->fetch_assoc();
                                                                    ?>
                                                                    <td class="product-condition"><?php echo $con["name"]; ?></td>
                                                                    <td class="product_stock"><?php if ((int)$pr["qty"] > 0) {
                                                                                                    echo "In Stock";
                                                                                                } else {
                                                                                                    echo "Out of Stock";
                                                                                                }
                                                                                                ?></td>
                                                                    <input class="d-none" type="number" value="1" id="qtyinput<?php echo $pr["id"] ?>">
                                                                    <td class="product_addcart"><a href="#" onclick="addtoshopcart(<?php echo $pr['id'] ?>);" class="btn btn-md btn-golden">Add To
                                                                            Cart</a></td>
                                                                </tr> <!-- End Wishlist Single Item-->

                                                            </tbody>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </table>

                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Cart Table -->
                </div> <!-- ...:::: End Wishlist Section:::... -->
            </div>
        <?php
        }

        require "footer.php";
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

        <!-- material-scrolltop button -->
        <button class="material-scrolltop" type="button"></button>


        <script src="assets/js/vendor/vendor.min.js"></script>
        <script src="assets/js/plugins/plugins.min.js"></script>

        <!-- Main JS -->
        <script src="assets/js/main.js"></script>
        <script src="script.js"></script>
    </body>


    </html>

<?php
} else {
?>
    <link rel="stylesheet" href="assets/css/style.min.css">

    <body class="bg-dark">

    </body>


    <!-- Modal -->
    <div class="modal fade" id="mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Unknown user please signin or signup to continue
                </div>
                <div class="modal-footer">
                    <a href="Signin_and_signup.php" type="button" class="btn btn-secondary">Signin or signup</a>
                   
                </div>
            </div>
        </div>
    </div>



    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>

    <script>
        var modal = document.getElementById("mod")
        k = new bootstrap.Modal(modal);
        k.show();
    </script>



<?php
}

?>