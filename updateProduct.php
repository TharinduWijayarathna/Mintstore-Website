<?php
session_start();

require "connection.php";

$product = $_SESSION["p"];
if (isset($product)) {

    $modelhsbrand = Database::search("SELECT * FROM model_has_brand WHERE `id` ='" . $product["model_has_brand_id"] . "'");
    $mb = $modelhsbrand->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="assets/images/logo/main.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="assets/custom/style.css" />

        <title>MintStore | Update Product</title>
    </head>

    <body>
        <div class="container-fluid bg-dark text-white">
            <div class="row gy-3">


                <div class="xa" id="pbox">
                    <!-- heading -->
                    <div class="col-12 mt-4 mb-2">
                        <h3 class="h2 text-center text-primary fw-bolder">Update Listing</h3>
                    </div>
                    <!-- heading -->
                    <!-- search feild -->
                    <!-- <div class="col-12 mb-2 mt-4">
                    <div class="row">
                        <div class="offset-0 offset-lg-1 col-lg-6">
                            <input type="text" class="form-control text-center" placeholder="Search Product You Want To Update" value="<?php echo $product["id"]; ?>" id="searchToUpdate"/>
                        </div>
                        <div class="col-12 col-lg-4 d-grid ">
                            <button class="mt-2 mt-lg-0 btn btn-primary" onclick="">Search Product</button>
                        </div>
                    </div>
                </div> -->
                    <!-- search feild -->
                    <hr class="line-break-1" />
                    <!-- category,brand,model -->

                    <div class="col-lg-12">
                        <div class="row">

                            <!-- Product Category Select -->

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label label-head ">Select Product Category</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select bg-dark text-white" id="ca" disabled>
                                            <?php


                                            $category  = Database::search("SELECT * FROM `category` WHERE `id` = '" . $product["category_id"] . "'");
                                            $cd = $category->fetch_assoc();
                                            ?>
                                            <option value="0"><?php echo $cd["name"]; ?></option>



                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Category Select -->

                            <!-- Product Brand Select -->

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label label-head">Select Product Brand</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select bg-dark text-white" id="br" disabled>
                                            <?php

                                            $bid = $mb["brand_id"];

                                            $brand  = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $bid . "'");
                                            $pb = $brand->fetch_assoc();
                                            ?>




                                            <option value="0"><?php echo $pb["name"]; ?></option>



                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Brand Select -->

                            <!-- Product Model Select -->

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label label-head">Select Product Model</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select bg-dark text-white" id="mo" disabled>
                                            <?php

                                            $mid = $mb["model_id"];

                                            $model  = Database::search("SELECT * FROM `model` WHERE `id` = '" . $mid . "'");
                                            $mb = $model->fetch_assoc();
                                            ?>


                                            <option value=""><?php echo $mb["name"]; ?></option>


                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Model Select -->

                        </div>
                    </div>

                    <!-- category,brand,model -->

                    <!-- break -->
                    <hr class="line-break-1" />
                    <!-- break -->

                    <!-- title  -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="form-label label-head ">Add a title to your product</label>
                            </div>
                        </div>
                        <div class="offset-lg-2 col-12 col-lg-8">
                            <input class="form-control bg-dark text-white" type="text" id="u_title" value="<?php echo $product['title']; ?>">
                        </div>
                    </div>
                    <!-- title -->

                    <!-- condition,color,qty -->

                    <!-- condition -->
                    <div class="col-12">
                        <div class="row">

                            <!-- condition -->
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label label-head">Select Product Condition</label>
                                    </div>

                                    <div class="form-check offset-1 offset-lg-1 col-10 col-lg-3 ms-5">
                                        <input class="form-check-input" type="radio" name="condition" id="bn" checked disabled>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            BrandNew
                                        </label>
                                    </div>
                                    <div class="form-check offset-1 offset-lg-1 col-10 col-lg-3 ms-5">
                                        <input class="form-check-input" type="radio" name="condition" id="us" disabled>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Used
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- condition -->

                            <!-- color -->

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label label-head">Select Product Colour</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                <input class="form-check-input" type="radio" name="color" value="gold" id="clr1" checked disabled>
                                                <label class="form-check-label" for="color1">
                                                    Gold
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                <input class="form-check-input" type="radio" name="color" value="silver" id="clr2" disabled>
                                                <label class="form-check-label" for="color2">
                                                    Silver
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                <input class="form-check-input" type="radio" name="color" value="graphite" id="clr3" disabled>
                                                <label class="form-check-label" for="color3">
                                                    Graphite
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                <input class="form-check-input" type="radio" name="color" value="pacific blue" id="clr4" disabled>
                                                <label class="form-check-label" for="color4">
                                                    Pacific Blue
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                <input class="form-check-input" type="radio" name="color" value="jet black" id="clr5" disabled>
                                                <label class="form-check-label" for="color4">
                                                    Jet Black
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                <input class="form-check-input" type="radio" name="color" value="rose gold" id="clr6" disabled>
                                                <label class="form-check-label" for="color5">
                                                    Rose Gold
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- color -->


                            <!-- product qty -->

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label label-head">Select Product Quantity</label>
                                        <input type="number" class="form-control bg-dark text-white" min="0" value="<?php echo $product["qty"] ?>" id="u_qty">
                                    </div>
                                </div>
                            </div>
                            <!-- product qty -->
                        </div>
                    </div>

                    <!-- condition,color,qty -->

                    <!-- break -->
                    <hr class="line-break-1" />
                    <!-- break -->

                    <!-- cost,payment -->

                    <!-- cost per item -->

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label label-head">Cost Per Item</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control bg-dark text-white" aria-label="Amount (to the nearest Rupee)" id="cost" value="<?php echo $product["price"]; ?>" disabled>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>


                            <!-- cost per item -->

                            <!-- payment -->
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label label-head">Approved Payment Methods</label>
                                    </div>
                                    <div class="col-10 offset-2">
                                        <div class="row">

                                            <div class=" col-3 payment-1"></div>
                                            <div class=" col-3 payment-2"></div>
                                            <div class=" col-3 payment-3"></div>
                                            <div class=" col-3 payment-4"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- payment -->
                        </div>
                    </div>
                    <!-- cost,payment -->

                    <!-- break -->
                    <hr class="line-break-1" />
                    <!-- break -->

                    <!-- delivery cost -->
                    <div class="col-12">
                        <label class="form-label label-head">Delivery Cost</label>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-lg-6">
                            <div class="row">

                                <div class="offset-lg-1 col-12 col-lg-3">
                                    <label class="form-label">Delivery cost within Colombo</label>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control bg-dark text-white" aria-label="Amount (to the nearest Rupee)" id="u_dwc" value="<?php echo $product["delivery_fee_colombo"]; ?>" />
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="offset-lg-1 col-12 col-lg-3">
                                    <label class="form-label">Delivery cost out of Colombo</label>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control bg-dark text-white" aria-label="Amount (to the nearest Rupee)" id="u_doc" value="<?php echo $product["delivery_fee_other"]; ?>" />
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- delivery cost -->

                    <!-- break -->
                    <hr class="line-break-1" />
                    <!-- break -->

                    <!-- START Description -->
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label label-head">Product Heading</label>
                                </div>
                                <div class="col-12">
                                    <textarea cols="100" rows="10" class="form-control bg-dark text-white" style="background-color: honeydew;" id="u_head"><?php echo $product["heading"]; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label label-head">Product Description</label>
                                </div>
                                <div class="col-12">
                                    <textarea cols="100" rows="10" class="form-control bg-dark text-white" style="background-color: honeydew;" id="u_desc"><?php echo $product["description"]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- END Description -->

                    <!-- product img -->

                    <div class="row mt-4">

                        <?php

                        $img = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");

                        for ($i = 0; $i < 4; $i++) {
                            $imgData = $img->fetch_assoc();
                        ?>
                            <div class="col-12 col-lg-2 offset-1">



                                <div class="col-12">
                                    <div class="col-12 mx-auto">
                                        <?php

                                        if (isset($imgData["code"])) {
                                        ?>
                                            <img class="col-8 productimg img-thumbnail bg-dark" src="images/product_img/<?php echo $imgData["code"]; ?>" id="prev<?php echo $i; ?>" style="height: 140px;">
                                        <?php
                                        } else {
                                        ?>
                                            <img class="col-8 productimg img-thumbnail bg-dark" src="assets/images/svgs/addproductimg.svg" id="prev<?php echo $i; ?>" style="height: 140px;">
                                        <?php
                                        }

                                        ?>

                                    </div>
                                    <div class="custom-file mt-3 mb-3">
                                        <input id="imguploader<?php echo $i; ?>" type="file" style="display:none;" accept="image/*" />
                                        <label for="imguploader<?php echo $i; ?>" class="col-6 col-lg-8 btn btn-primary" onclick="changeImg<?php echo $i; ?>();">Upload</label>
                                    </div>
                                </div>

                            </div>
                        <?php
                        }

                        ?>

                    </div>
                    <!-- product img -->

                    <!-- break -->
                    <hr class="line-break-1" />
                    <!-- break -->

                    <!-- notice -->
                    <div class="col-12">
                        <label class="form-label label-head">Notice...</label>
                        <br />
                        <label class="form-label">We are taking 5% of the product price from every product as a service charge.</label>
                    </div>
                    <!-- notice -->

                    <div class="row offset-0 offset-lg-4 col-lg-4">

                        <!-- save button -->
                        <div class="d-grid col-12">
                            <button class="btn btn-primary search-button" onclick="updateProduct(<?php echo $product['id']; ?>);">Update Product</button>
                        </div>
                        <!-- save button -->
                    </div>




                </div>


            </div>
        </div>

         <!-- Modal Brand -->
         <div class="modal fade" id="errorModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background-color:#435c70;">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Warning!</h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <p class="text-white" id="msg"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" data-bs-dismiss="modal" onclick="reload();">Refresh</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Brand -->



        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>
<?php

}
?>