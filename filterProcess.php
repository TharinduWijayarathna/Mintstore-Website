<?php
require "connection.php";

session_start();

// $user = $_SESSION["user"];
// $user = $_SESSION["user"];
$urs = Database::search("SELECT * FROM `admin` WHERE `email` = 'tharinduwijayarathne87@gmail.com'");
$user = $urs->fetch_assoc();

$array;



$search = $_POST["s"];
$age = $_POST["a"];
$qty = $_POST["q"];
$condition = $_POST["c"];

$pageno = $_POST["p"];

$result_per_page = 6;


// echo $search;
// echo "<br/>";
// echo $age;
// echo "<br/>";
// echo $qty;
// echo "<br/>";
// echo $condition;
// echo $pageno;

if (!empty($search) && $age != 0) {
    if ($age == 1) {

        $prs = Database::search("SELECT * FROM `product`
         WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' ORDER BY `datetime_added` DESC ");

        $ans = $prs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' 
        AND `title` LIKE '%" . $search . "%' ORDER BY `datetime_added` DESC 
         LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    } else if ($age == 2) {

        $prs = Database::search("SELECT * FROM `product`
        WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' ORDER BY `datetime_added` ASC");



        $ans = $prs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' 
AND `title` LIKE '%" . $search . "%' ORDER BY `datetime_added` ASC 
LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    }
} else if (!empty($search)) {
    $products = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%'");


    $ans = $products->num_rows;

    $number_of_pages = ceil($ans / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;

    $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' 
    AND `title` LIKE '%" . $search . "%'  
    LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
} else if ($age != 0) {
    if ($age == 1) {
        $prs = Database::search("SELECT * FROM `product`WHERE `user_email`='" . $user["email"] . "' ORDER BY `datetime_added` DESC");

        $ans = $prs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' 
        ORDER BY `datetime_added` DESC  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "  ");
    } else if ($age == 2) {
        $prs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' ORDER BY `datetime_added` ASC");

        $ans = $prs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '"  . $user["email"] . "' ORDER BY `datetime_added` ASC  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    }
} else if (!empty($search) && $qty != 0) {
    if ($qty == 1) {
        $qtyrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'  AND `title` LIKE '%" . $search . "%' ORDER BY `qty` DESC");

        $ans = $qtyrs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "'  AND  `title` LIKE '%" . $search . "%'  ORDER BY `qty` DESC  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "");
    } else if ($qty == 2) {

        $qtyrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'  AND  `title` LIKE '%" . $search . "%' ORDER BY `qty`  ASC;");
        $ans = $qtyrs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND  `title` LIKE '%" . $search . "%'  ORDER BY `qty`  ASC  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    } else {
        echo "No Result.....";
    }
} else if ($qty != 0) {
    if ($qty == 1) {
        $qtyrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'   ORDER BY `qty` DESC");

        $ans = $qtyrs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "'    ORDER BY `qty` DESC  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "");
    } else if ($qty == 2) {

        $qtyrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'  ORDER BY `qty`  ASC;");
        $ans = $qtyrs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "'   ORDER BY `qty`  ASC  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    } else {
        echo "No Result.....";
    }
} else if ($condition != 0) {
    if ($condition == 1) {
        $conrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `condition_id` = '" . $condition . "'  ");

        $ans = $conrs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `condition_id` = '" . $condition . "'  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "");
    } else if ($condition == 2) {

        $conrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `condition_id` = '" . $condition . "'");
        $ans = $conrs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "'   AND `condition_id` = '" . $condition . "'  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    } else {
        echo "No Result.....";
    }
} else if (!empty($search) && $condition != 0) {
    if ($condition == 1) {
        $conrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `condition_id` = '" . $condition . "'  AND `title` LIKE '%" . $search . "%'  ");

        $ans = $conrs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `condition_id` = '" . $condition . "'  AND `title` LIKE '%" . $search . "%'  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "");
    } else if ($condition == 2) {

        $conrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `condition_id` = '" . $condition . "'  AND `title` LIKE '%" . $search . "%'");
        $ans = $conrs->num_rows;

        $number_of_pages = ceil($ans / $result_per_page);
        $page_first_result = ((int)$pageno - 1) * $result_per_page;

        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "'   AND `condition_id` = '" . $condition . "'  AND `title` LIKE '%" . $search . "%'  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    } else {
        echo "No Result.....";
    }
}
if (isset($selectedrs)) {
    $srn = $selectedrs->num_rows;
    for ($i = 0; $i < $srn; $i++) {
        $searchage = $selectedrs->fetch_assoc();
?>


        <?php
        $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $searchage["id"] . "' ");
        $pir = $pimgrs->fetch_assoc();

        ?>


        <!---->
        <div class="card mb-3 col-12 col-lg-6 mt-3 shadow" id="card<?php echo $searchage['id']; ?>">
            <div class="row">
                <?php
                $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $searchage["id"] . "' ");
                $pir = $pimgrs->fetch_assoc();

                ?>

                <div class="col-md-4 mt-4">
                    <img src="images/product_img/<?php echo $pir["code"]; ?>" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $searchage["title"] ?></h5>
                        <span class="card-text fw-bold text-primary">Rs. <?php echo $searchage["price"] ?> .00</span>
                        <br />
                        <span class="card-text fw-bold text-success"><?php echo $searchage["qty"] ?> items left</span>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="change<?php echo $searchage['id'] ?>" onchange="changeStatus(<?php echo $searchage['id']; ?>);" <?php if ($searchage["status_id"] == 2) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?> />

                            <label class="<?php if ($searchage["status_id"] == 2) {
                                                echo "form-check-label fw-bold text-info";
                                            } else {
                                                echo "form-check-label fw-bold text-danger";
                                            } ?>" for="change<?php echo $searchage['id'] ?>" id="checklabel<?php echo $searchage['id']; ?>"><?php if ($searchage["status_id"] == 2) {
                                                                                                                                                echo "Make Your Product Active";
                                                                                                                                            } else {
                                                                                                                                                echo "Make Your Product Deactive";
                                                                                                                                            } ?></label>
                        </div>
                        <div class="col-12">
                            <div class="row gy-2">
                                <div class="col-12 col-xl-6 d-grid">
                                    <a href="#" class="btn btn btn-success" onclick="sendid(<?php echo $searchage['id']; ?>)">Update</a>
                                </div>
                                <div class="col-12 col-xl-6 d-grid">
                                    <a href="#" class="btn btn-danger" onclick="deletemodel(<?php echo $searchage['id']; ?>);">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- </div> -->

        <!-- Modal -->
        <div class="modal fade" id="deletemodel<?php echo $searchage['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Warning...</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are You Sure You Want To Delete This Product
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" onclick="deleteproduct(<?php echo $searchage['id'] ?>);">Yes</button>
                    </div>
                </div>
            </div>
        </div>


    <?php
    }
    ?>
    <div class="12 mt-3 mb-3">
        <div class="col-12 d-flex justify-content-center">
            <div class="pagination">

                <?php


                if ($pageno <= 1) {
                ?>

                    <button class="active btn fs-4  mb-3" onclick="addFilters(<?php echo $pageno ?>);">&laquo;</button>
                <?php
                } else {
                ?>

                    <button class="active btn fs-4   mb-3" onclick="addFilters(<?php echo ($pageno - 1); ?>);">&laquo;</button>


                <?php

                }
                ?>

                <?php

                for ($page = 1; $page <= $number_of_pages; $page++) {
                    if ($page == $pageno) {
                ?>
                        <button class="active btn  btn btn-success  mb-3 " onclick="addFilters(<?php echo $page ?>);"><?php echo $page ?></button>

                    <?php
                    } else {
                    ?>
                        <button class="active btn  btn btn-secondary  mb-3" onclick="addFilters(<?php echo $page ?>);"><?php echo $page ?></button>

                    <?php

                    }
                    ?>



                <?php
                }

                if ($pageno >= $number_of_pages) {
                ?>
                    <button class="active btn fs-4 mb-3" onclick="addFilters(<?php echo $pageno ?>);">&raquo;</button>
                <?php
                } else {
                ?>
                    <button class="active btn fs-4 mb-3" onclick="addFilters(<?php echo ($pageno + 1); ?>);">&raquo;</button>
                <?php

                }
                ?>

            </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="col-12 my-auto text-center">
        <img src="resources/empty.svg" class="img-fluid"/>
        <h1 class="text-danger">No items...</h1>
    </div>
<?php
}
