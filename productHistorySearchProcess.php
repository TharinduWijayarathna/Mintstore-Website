<?php
// session_start();
require "connection.php";

if (isset($_GET["s"])) {
    $search =  $_GET["s"];

    // echo $pageno;

    if (!empty($search)) {

        $results_per_page = 5;
        $pageno = $_GET["p"];

        $allproductresult = Database::search("SELECT * FROM `product` INNER JOIN `invoice` ON product.id = invoice.product_id WHERE product.`title` LIKE '%" . $search . "%' ORDER BY `date` ASC;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT * FROM `product` INNER JOIN `invoice` ON product.id = invoice.product_id WHERE product.`title` LIKE '%" . $search . "%' ORDER BY `date` ASC LIMIT 5 OFFSET $page_first_result;");
        // echo "1";



        $productnum = $productresult->num_rows;


?>
        <?php
        for ($x = 0; $x < $productnum; $x++) {
            $product = $productresult->fetch_assoc();




        ?>
            <div class="col-12 mb-2">
                <div class="row" id="product_div">
                    <div class="col-2 bg-primary pt-2 pb-2 text-end">
                        <span class="fs-5 fw-bold text-white"><?php echo $product["order_id"]; ?></span>
                    </div>

                    <div class="col-6 col-lg-2 col-lg-3 bg-light pt-2 pb-2 text-center">
                        <span class="fs-5 fw-bold"><?php echo $product["title"]; ?></span>
                    </div>
                    <?php
                    $user_r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $product["user_email"] . "' ");
                    $userd = $user_r->fetch_assoc();
                    ?>
                    <div class="col-4 col-lg-3 bg-primary pt-2 pb-2">
                        <span class="fs-5 fw-bold text-white"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></span>
                    </div>
                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-5 fw-bold">Rs. <?php echo $product["price"]; ?> .00</span>
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-5 fw-bold text-white"><?php echo $product["qty"]; ?></span>
                    </div>
                </div>
            </div>


        <?php
        }
        ?>


        <!--pagination-->
        <div class="page-pagination text-center mb-6" data-aos="fade-up" data-aos-delay="0">
            <ul>
                <li> <a class="ion-ios-skipbackward" <?php

                                                        if ($pageno <= 1) {
                                                            echo "#";
                                                        } else {
                                                        ?> onclick="searchProductHistory('<?php echo ($pageno - 1) ?>');" <?php
                                                                                                                    }

                                                                                                                        ?>></a></li>

                <?php

                for ($page = 1; $page <= $number_of_pages; $page++) {

                    if ($page == $pageno) {
                ?>
                        <li> <a onclick="searchProductHistory('<?php echo $page ?>');" class="active"><?php echo $page; ?></a></li>
                    <?php
                    } else {
                    ?>

                        <li><a onclick="searchProductHistory('<?php echo $page ?>');"><?php echo $page; ?></a></li>

                <?php
                    }
                }

                ?>
                <li><a <?php

                        if ($pageno >= $number_of_pages) {
                            echo "#"; ?> class="ion-ios-skipforward" <?php
                                                            } else {
                                                                ?> onclick="searchProductHistory('<?php echo ($pageno + 1) ?>');" class="ion-ios-skipforward" <?php
                                                                                                                }

                                                                                                                    ?>></a></li>
                <ul>
        </div>


<?php
    } else {
        echo "<h5 class = 'mt-4 mb-4 fw-bold text-center' style = 'color:black;'> Please Enter Product Name..  </h5>";
    }
}
?>