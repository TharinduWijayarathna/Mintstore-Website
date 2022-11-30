<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Mintstore | Order Tracking</title>

        <link rel="icon" href="assets/images/logo/main.png" />


        <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
        <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
        <link rel="stylesheet" href="assets/css/style.min.css">
        <link rel="stylesheet" href="assets/css/track.css">
    </head>

    <body>


        <?php



        require "header.php";
        ?>



        <div class="container">
            <article class="card">
                <header class="card-header"> My Orders / Tracking </header>
                <div class="card-body">

                    <?php
                    $track = Database::search("SELECT * FROM `ordertrack` WHERE `user_email`='" . $_SESSION["user"]["email"] . "'");
                    $tracknm = $track->num_rows;

                    for ($t = 0; $t < $tracknm; $t++) {
                        $trackrs = $track->fetch_assoc();

                    ?>

                        <h6>Order ID: <?php echo $trackrs["order_id"] ?></h6>
                        <article class="card">
                            <div class="card-body row">
                                <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php
                                                                                                $datefix = $trackrs["date"];
                                                                                                $date = strtotime($datefix);
                                                                                                $date = strtotime("+7 day", $date);
                                                                                                echo date('jS F Y', $date);

                                                                                                ?></div>
                                <div class="col"> <strong>Shipping BY:</strong> <br> SLDelivers | <i class="fa fa-phone"></i> +94767036495 </div>
                                <div class="col"> <strong>Status:</strong> <br>
                                    <?php
                                    $status = Database::search("SELECT * FROM `order_status` WHERE `id`='" . $trackrs["order_status_id"] . "' ");
                                    $st = $status->fetch_assoc();

                                    echo $st["status"];
                                    ?>

                                </div>
                                <div class="col"> <strong>Tracking #:</strong> <br> #<?php echo $trackrs["trackid"]; ?> </div>
                            </div>
                        </article>
                        <div class="track">
                            <div class="step <?php if ($trackrs["order_status_id"] >= 1) {
                                                    echo "active";
                                                } else {
                                                } ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                            <div class="step <?php if ($trackrs["order_status_id"] >= 2) {
                                                    echo "active";
                                                } else {
                                                } ?>"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                            <div class="step  <?php if ($trackrs["order_status_id"] >= 3) {
                                                    echo "active";
                                                } else {
                                                } ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                            <div class="step  <?php if ($trackrs["order_status_id"] >= 4) {
                                                    echo "active";
                                                } else {
                                                } ?>"> <span class="icon"> <i class="fa fa-arrow-right"></i> </span> <span class="text">Ready for pickup</span> </div>
                        </div>
                        <hr>
                        <ul class="row">
                            <?php

                            $inxs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $trackrs["order_id"] . "' AND `user_email`='" . $_SESSION["user"]["email"] . "'");
                            $inxrs = $inxs->num_rows;

                            for ($p = 0; $p < $inxrs; $p++) {
                                $inprs = $inxs->fetch_assoc();

                                $product = Database::search("SELECT * FROM `product` WHERE `id` = '" . $inprs["product_id"] . "'");
                                $prs = $product->fetch_assoc();
                            ?>

                                <li class="col-md-4">
                                    <figure class="itemside mb-3">
                                        <?php
                                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" .  $inprs["product_id"] . "'");
                                        $in = $imagers->num_rows;
                                        $arr;
                                        for ($x = 0; $x < $in; $x++) {
                                            $ir = $imagers->fetch_assoc();
                                            $arr[$x] = $ir["code"];
                                        }
                                        ?>
                                        <div class="aside"><img src="images/product_img/<?php echo $arr[0] ?>" class="img-sm border"></div>
                                        <figcaption class="info align-self-center">
                                            <p class="title"><?php echo $prs["title"] ?></p> <span class="text-muted">Rs.<?php echo $prs["price"] ?>.00 </span>
                                        </figcaption>
                                    </figure>
                                </li>

                            <?php
                            }



                            ?>


                        </ul>
                        <hr style="height: 3px; background-color: black;">
                    <?php
                    }
                    ?>

                    <hr> <a href="index.php" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to Home</a>
                </div>
            </article>
        </div>

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