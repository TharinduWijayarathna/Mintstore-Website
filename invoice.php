<?php
session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $umail = $_SESSION["user"]["email"];
    $oid = $_GET["id"];

?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mintstore | Invoice</title>

        <link rel="icon" href="assets/images/logo/main.png" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="bootstrap.css" />

        <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
        <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
        <link rel="stylesheet" href="assets/css/style.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    </head>

    <body style="background-color: #f7f7ff;" onload="pdfdonw();">
        <?php

        require "header.php";

        ?>
        <div id="load">
            <div class="container-fluid">

                <div class="row p-1">

                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12 btn-toolbar justify-content-end">
                        <button class="btn btn-golden me-2" onclick="printDiv()"><i class="bi bi-printer-fill"></i>&nbsp; Print</button>
                        <button class="btn btn-green me-2" id="download"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp; Save as PDF</button>
                    </div>

                    <div class="col-12">
                        <hr />
                    </div>
                    <div id="invoice">
                        <div class="col-12">
                            <div class="row">

                                <div class="col-6 my-auto">
                                    <div style="height: 80px;
                                            background-image: url('assets/images/logo/logo_black.png'); 
                                            background-repeat: no-repeat; 
                                            background-size: contain;">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12  text-end fw-bold text-decoration-underline text-primary">
                                            <h2>MintStore</h2>
                                        </div>
                                        <div class="col-12 text-end fw-bold">
                                            <span class="">Maradana, Colombo 10, Sri Lanka</span><br />
                                            <span>+94112546978</span><br />
                                            <span>MintStoreLK@gmail.com</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 mb-4">
                            <div class="row">

                                <div class="col-6">
                                    <h5>INVOICE TO :</h5>
                                    <?php
                                    $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'  ");
                                    $ar = $addressrs->fetch_assoc();
                                    ?>
                                    <h2><?php echo $_SESSION["user"]["fname"] . " " . $_SESSION["user"]["lname"]; ?></h2>
                                    <span class="fw-bold"><?php echo $ar["line1"] . "," . $ar["line2"]; ?></span><br />
                                    <span class="fw-bold text-success text-decoration-underline"><?php echo $ar["user_email"] ?></span>
                                </div>
                                <?php
                                $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id`= '" . $oid . "'");
                                $ir = $invoicers->fetch_assoc();

                                ?>

                                <div class="col-6 text-end my-auto">
                                    <h1 class="text-success">INVOICE 0<?php echo $ir["id"]; ?></h1>
                                    <span class="fw-bold">Date and Time of Invoice :</span>&nbsp;
                                    <span class="fw-bold"><?php echo $ir["date"]; ?></span>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table">

                                <thead>
                                    <tr class="border border-1 border-white">
                                        <th>#</th>
                                        <th>Order Id & Product</th>
                                        <th class="text-end">Unit Pice</th>
                                        <th class="text-end">Quantity</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <?php
                                $invoices = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                                $ind = $invoices->num_rows;

                                $subtotal = "0";

                                for ($i = 0; $i < $ind; $i++) {

                                    $irs = $invoices->fetch_assoc();

                                    $pid = $irs["product_id"];

                                    $subtotal = $subtotal + $irs["total"];

                                    $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
                                    $pd = $productrs->fetch_assoc();


                                ?>

                                    <tr style="height: 70px;">
                                        <td class="bg-danger text-white fs-3"><?php echo $irs["id"] ?></td>
                                        <td>
                                            <a href="#" class="fs-6 fw-bold p-2"><?php echo $irs["order_id"]; ?></a><br />
                                            <a href="#" class="fs-6 fw-bold p-2"><?php echo $pd["title"]; ?></a>
                                        </td>
                                        <td class="fs-6 text-end pt-3" style="background-color: rgb(199,199,199);">Rs. <?php echo $pd["price"]; ?>.00</td>
                                        <td class="fs-6 text-end pt-3"><?php echo $irs["qty"]; ?></td>
                                        <td class="fs-6 text-end pt-3 bg-danger text-white">Rs. <?php echo $irs["total"] ?> .00</td>
                                    </tr>

                                <?php
                                }

                                ?>

                                <tbody>



                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="border-0"></td>
                                        <td colspan="2" class="fs-5 text-end">SUBTOTAL</td>
                                        <td class="fs-5 text-end">Rs. <?php echo $irs["total"] ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="border-0"></td>
                                        <td colspan="2" class="fs-5 text-end border-success">Shipping</td>
                                        <td class="fs-5 text-end border-danger">Rs. 00 .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="border-0"></td>
                                        <td colspan="2" class="fs-5 text-end border-0 text-success">GRAND TOTAL</td>
                                        <td class="fs-5 text-end border-0 text-success">Rs. <?php echo $irs["total"] ?> .00</td>
                                    </tr>

                                </tfoot>
                                </tbody>



                            </table>

                        </div>

                        <div class="col-4 text-center" style="margin-top: -130px; margin-bottom: 50px;">
                            <span class="fs-1">Thank You!</span>
                        </div>

                        <div class="col-12 my-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-success rounded" style="background-color: #e7f2ff;">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="form-label fs-5 fw-bold">NOTICE :&nbsp;</label>
                                    <label class="form-label fs-5">Purchased items can return before 7 days of delivery.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 mb-3 text-center">
                            <label class="form-label fs-6 text-black-50">
                                Invoice was created on a computer and is valid without the Signature and Seal.
                            </label>
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
        <script src="script.js"></script>

        <!-- Main JS -->
        <script src="assets/js/main.js"></script>
    </body>

    </html>


<?php
}
?>