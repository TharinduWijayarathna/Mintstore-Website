<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $mail = $_SESSION["user"]["email"];

    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $mail . "'");

    $in = $invoicers->num_rows;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mintstore | Purchase History</title>

        <link rel="icon" href="assets/images/logo/main.png" />


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
        <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
        <link rel="stylesheet" href="assets/css/style.min.css">
    </head>

    <body>
        <?php
        require "header.php";
        ?>
        <div class="container-fluid"  id="load">



            <div class="row">

                <div class="col-12 text-center mt-9 mb-9">
                    <h3 class="text-dark fs-2 text-decoration-underline" style="font-weight: 600;">Transaction History</h3>
                </div>

                <?php
                if ($in == 0) {
                ?>
                    <div class="col-12 text-center bg-light" style="height: 450px;">
                        <span class="fs-1 fw-bold text-black-50 d-block" style="margin-top: 150px;">You have no items in your Transaction History yet...</span>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 d-none d-lg-block">
                                <div class="row">

                                    <div class="col-2 bg-light">
                                        <label class="form-label fw-bold">#</label>
                                    </div>

                                    <div class="col-2 bg-light">
                                        <label class="form-label fw-bold">Order Details</label>
                                    </div>

                                    <div class="col-2 bg-light text-end">
                                        <label class="form-label fw-bold">Quantity</label>
                                    </div>

                                    <div class="col-2 bg-light text-end">
                                        <label class="form-label fw-bold">Amount</label>
                                    </div>

                                    <div class="col-2 bg-light text-end">
                                        <label class="form-label fw-bold">Purchased Date & Time</label>
                                    </div>

                                    <div class="col-2 bg-light"></div>
                                    <div class="col-12">
                                        <hr />
                                    </div>

                                </div>
                            </div>
                            <?php
                            for ($i = 0; $i < $in; $i++) {
                                $ir = $invoicers->fetch_assoc();
                            ?>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-2 text-lg-start" style="background-color: #FFFDD0;">
                                            <label class="form-label text-black fs-6 py-5"><?php echo $ir["order_id"]; ?></label>
                                        </div>
                                        <div class="col-12 col-lg-3" style="background-color: #FFFDD0;">
                                            <div class="row">
                                                <div class="card mx-3 my-3" style="max-width: 540px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 my-auto">
                                                            <?php
                                                            $pid = $ir["product_id"];
                                                            $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                                            $n = $imagers->num_rows;
                                                            $array;
                                                            for ($x = 0; $x < $n; $x++) {
                                                                $f = $imagers->fetch_assoc();
                                                                $array[$x] = $f["code"];
                                                            }
                                                            ?>
                                                            <img src="images/product_img/<?php echo $array["0"]; ?>" class="img-fluid rounded-start">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <?php

                                                                $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
                                                                $pr = $productrs->fetch_assoc();
                                                                ?>
                                                                <h5 class="card-title"><?php echo $pr["title"]; ?></h5>
                                                                <?php
                                                                $sm = $pr["user_email"];
                                                                $sellerrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $sm . "'");
                                                                $sr = $sellerrs->fetch_assoc();
                                                                ?>
                                                                <p class="card-text"><b>Seller :</b> <?php echo $sr["fname"] . " " . $sr["lname"]; ?></p>
                                                                <p class="card-text fw-bold"><b>Price :</b> Rs. <?php echo $pr["price"] ?> .00</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-1 text-start text-lg-end" style="background-color: #FFFDD0;">
                                            <label class="form-label fs-4 pt-5"><?php echo $ir["qty"] ?></label>
                                        </div>

                                        <div class="col-12 col-lg-2 text-start text-lg-end " style="background-color: #FFFDD0;">
                                            <label class="form-label text-dark fs-5 px-3 py-5 fw-bold">Rs. <?php echo $ir["total"] ?> .00</label>
                                        </div>

                                        <div class="col-12 col-lg-2 text-start text-lg-end" style="background-color: #FFFDD0;">
                                            <label class="form-label fs-4 pt-5"><?php echo $ir["date"] ?></label>
                                        </div>

                                        <div class="col-12 col-lg-2" style="background-color: #FFFDD0;">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-golden rounded mt-5" onclick="addFeedback(<?php echo $pid; ?>)"><i class="bi bi-info-circle-fill"></i> Feedback</button>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-black-default-hover rounded mt-5" onclick="deleteproductFromhistory(<?php echo $ir['id']; ?>);"><i class="bi bi-trash-fill"></i> Delete</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>


                                        <!-- Modal -->
                                        <div class="modal fade" id="feedbackModal<?php echo $pid; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $pr["title"]; ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea class="form-control fs-5" id="feedtxt<?php echo $pid; ?>" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-pink" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-green" onclick="saveFeedback(<?php echo $pid; ?>);">Save Feedback</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                    <?php
                                }
                                    ?>
                                    </div>
                                </div>

                        </div>
                    </div>


                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-lg-9 d-none d-lg-block"></div>
                            <div class="col-12 col-lg-3 d-grid">
                                <button class="btn btn-black-default-hover fs-6" onclick="deleteallproductFromhistory();"><i class="bi bi-trash-fill"></i> Clear All Records.</button>
                            </div>
                        </div>
                    </div>




            </div>
        </div>
    <?php
                }
    ?>
    <?php
    require "footer.php";
    ?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>






    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="script.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    </body>

    </html>

<?php
}else{
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