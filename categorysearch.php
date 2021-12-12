<?php
require "connection.php";

$id = $_GET["id"];
$pageno = 1;

$result_per_page = 9;

$product = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $id . "' AND `status_id`='1'");
$productnm = $product->num_rows;

$number_of_pages = ceil($productnm / $result_per_page);
$page_first_result = ((int)$pageno - 1) * $result_per_page;

$selectedrs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $id . "'  AND `status_id`='1' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
$n =  $selectedrs->num_rows;

if ($n >= 1) {

    while ($p = $selectedrs->fetch_assoc()) {

        # code...
?>
        <div class="col-xl-4 col-sm-6 col-12">
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
<?php
} else {
?>
    <div class="mt-9"></div>
    <div class="col-12 bg-light ms-2 mt-9 mb-5" style="margin-left: auto; margin-right: auto;">
        <h3 class="text-center">No Items Listed Yet..</h3>
    </div>

<?php

}

?>