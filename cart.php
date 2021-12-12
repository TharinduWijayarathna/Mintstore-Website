<?php

require "connection.php";

session_start();

if (isset($_SESSION["user"])) {
    $umail = $_SESSION["user"]["email"];

    $total = "0";
    $subtotal = "0";
    $shipping = "0";

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Mintstore | Cart</title>

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

            <?php

            $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $umail . "'");
            $cn = $cartrs->num_rows;

            if ($cn == 0) {
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
                                        <h4 class="title">Your Cart is Empty</h4>
                                        <h6 class="sub-title">Sorry Mate... No item Found inside your cart!</h6>
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

                <!-- ...:::: Start Cart Section:::... -->
                <div class="cart-section mt-9">
                    <!-- Start Cart Table -->
                    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table_desc">
                                        <div class="table_page table-responsive">
                                            <table>
                                                <!-- Start Cart Table Head -->
                                                <thead>
                                                    <tr>
                                                        <th class="product_remove">Delete</th>
                                                        <th class="product_thumb">Image</th>
                                                        <th class="product_name">Product</th>

                                                        <th class="product-color">Colour</th>
                                                        <th class="product-condition">Condition</th>
                                                        <th class="product_quantity">Quantity</th>
                                                        <th class="product_total">Total Price</th>
                                                        

                                                    </tr>
                                                </thead> <!-- End Cart Table Head -->
                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < $cn; $i++) {
                                                        $cr = $cartrs->fetch_assoc();

                                                        $productrs  = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
                                                        $pr = $productrs->fetch_assoc();

                                                        $total = $total + ($pr["price"] * $cr["qty"]);

                                                        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "'");
                                                        $ar = $addressrs->fetch_assoc();
                                                        $locationid = $ar["location_id"];

                                                        $locationrs = Database::search("SELECT * FROM `location` WHERE `id` = '" . $locationid . "'");
                                                        $lr = $locationrs->fetch_assoc();

                                                        $districtid = $lr["district_id"];

                                                        $ship = "0";

                                                        if ($districtid == "2") {
                                                            $ship = $pr["delivery_fee_colombo"];
                                                            $shipping = $shipping + $pr["delivery_fee_colombo"];
                                                        } else {
                                                            $ship = $pr["delivery_fee_other"];
                                                            $shipping = $shipping + $pr["delivery_fee_other"];
                                                        }

                                                        // echo $total;

                                                        // echo $shipping;

                                                        $sellerrs = Database::search("SELECT * FROM `user` WHERE `email`= '" . $pr["user_email"] . "'  ");
                                                        $sn = $sellerrs->fetch_assoc();

                                                    ?>
                                                        <!-- Start Cart Single Item-->
                                                        <tr>
                                                            <td class="product_remove"><a href="#" onclick="deletefromCart(<?php echo $cr['id']; ?>);"><i class="fa fa-trash-o"></i></a>
                                                            </td>
                                                            <?php
                                                            $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pr["id"] . "'");
                                                            $in = $imagers->num_rows;
                                                            $arr;
                                                            for ($x = 0; $x < $in; $x++) {
                                                                $ir = $imagers->fetch_assoc();
                                                                $arr[$x] = $ir["code"];
                                                            }
                                                            ?>
                                                            <td class="product_thumb"><a href="#"><img src="images/product_img/<?php echo $arr[0] ?>" alt=""></a></td>
                                                            <td class="product_name"><a href="#"><?php echo $pr["title"]; ?></a></td>

                                                            <?php
                                                            $color = Database::search("SELECT * FROM `color` WHERE `id`='" . $pr["color_id"] . "'");
                                                            $clr = $color->fetch_assoc();
                                                            ?>

                                                            <td class="product-color"><?php echo $clr["name"]; ?></td>

                                                            <?php
                                                            $condition = Database::search("SELECT * FROM `condition` WHERE `id`='" . $pr["condition_id"] . "'");
                                                            $con = $condition->fetch_assoc();
                                                            ?>
                                                            <td class="product-condition">
                                                            <?php
                                                            echo $con["name"]; 
                                                            ?>
                                                            <!-- </td> -->
                                                            <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="<?php echo $cr["qty"]; ?>" type="number" onchange="cartupdate(<?php echo $cr['id']?>);autoprice(<?php echo $cr['id']?>);autosubtotal();autototal();" id="qtyup<?php echo $cr["id"];?>"></td>
                                                            <td class="product_total" id="price<?php echo $cr["id"]?>" >Rs.<?php echo ($pr["price"] * $cr["qty"]) + $shipping; ?>.00</td>
                                                            
                                                        </tr> <!-- End Cart Single Item-->
                                                    <?php

                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Cart Table -->

                    <!-- Start Coupon Start -->
                    <div class="coupon_area">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12 col-md-12">
                                    <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                                        <h3>Cart Totals</h3>
                                        <div class="coupon_inner">
                                            <div class="cart_subtotal">
                                                <p>Items</p>
                                                <p class="cart_amount"> <?php echo  $cn; ?></p>
                                            </div>
                                            <div class="cart_subtotal">
                                                <p>Subtotal</p>
                                                <p class="cart_amount" id="sub">Rs.<?php echo $total ?>.00</p>
                                            </div>
                                            <div class="cart_subtotal ">
                                                <p>Shipping</p>
                                                <p class="cart_amount">Rs.<?php echo $shipping ?>.00</p>
                                            </div>
                                            <a href="#">Calculate shipping</a>

                                            <div class="cart_subtotal">
                                                <p>Total</p>
                                                <p class="cart_amount" id="tot">Rs.<?php echo $total + $shipping ?>.00</p>
                                            </div>
                                            <div class="checkout_btn">
                                                <a href="#" onclick="checkout();" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Coupon Start -->
                </div> <!-- ...:::: End Cart Section:::... -->

            <?php

            }
            ?>
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
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
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