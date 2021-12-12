<?php


session_start();

require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>Mintstore | About</title>

    <link rel="icon" href="assets/images/logo/main.png" />


    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>

<body>

    <?php
    require "header.php";
    ?>
    <div id="load">
        <!-- Start About Top -->
        <div class="about-top mt-9 mb-9">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-between d-sm-column">
                    <div class="col-md-6">
                        <div class="about-img" data-aos="fade-up" data-aos-delay="0">
                            <div class="img-responsive">
                                <img src="assets/images/about/img-about.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="title">ABOUT OUR MINTSTORE</h3>
                            <h5 class="semi-title">Your mobile device has quickly become the easiest portal into your digital self.</h5>
                            <p>Mobile is changing the way we relate to the world. Beyond just devices, mobile represents not only a channel, but an entirely new digital lifestyle. We are moving past smartphone and tablet definitions to discover the bigger picture of what comes next.In Our Mintstore you can buy every future upcoming devices for respectable price.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Top -->
    </div>
    <?php
    require "footer.php";
    ?>


    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>
</body>



</html>