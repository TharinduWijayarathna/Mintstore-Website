<?php
session_start();

require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>Mintstore | Contact Us</title>

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

        <!-- ...::::Start Map Section:::... -->
        <div class="map-section mt-9" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=nishasoft%20technology&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...::::End  Map Section:::... -->

        <!-- ...::::Start Contact Section:::... -->
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Start Contact Details -->
                        <div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up" data-aos-delay="0">
                            <div class="contact-details">
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <a href="tel:+94 112 215684">+94 112 215684</a>
                                        <a href="tel:+94 112 325478">+94 112 325478</a>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <a href="mailto:mintstorelk@gmail.com">mintstorelk@gmail.com</a>
                                        <a href="http://localhost/mintstore/index.php">www.mintstore.lk</a>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <span>Maradana, Colombo 10,Sri Lanka</span>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                            </div>
                            <!-- Start Contact Social Link -->
                            <div class="contact-social">
                                <h4>Follow Us</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div> <!-- End Contact Social Link -->
                        </div> <!-- End Contact Details -->
                    </div>
                    <div class="col-lg-8">

                        <div class="contact-form section-top-gap-100" data-aos="fade-up" data-aos-delay="200">
                            <h3>Send a Message</h3>
                            <div class="col-lg-12 col-md-12 col-12">

                                <div class="contact-form-head" style=" overflow-y: scroll;">
                                    <div class="form-main">
                                        <div style="max-height: 450px;min-height: 310px;">
                                            <div class="position-relative" style="border-radius: 20px;">
                                                <div class="chat-messages px-4" id="msgContent">
                                                    <!--Msg load area-->
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="flex-grow-0 py-3 px-4 border-top">
                                    <div class="input-group">
                                        <?php
                                        if (isset($_SESSION["user"])) {
                                        ?>
                                            <input type="text" class="form-control" id="content" placeholder="Type your message">
                                            <button class="btn btn-black-default-hover" onclick="sendMsg('<?php echo $_SESSION['user']['email'] ?>');">Send</button>
                                        <?php
                                        } else {
                                        ?>
                                            <span>Please Login to Chat With Admin</span>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ...::::ENd Contact Section:::... -->
    </div>

    <?php
    require "footer.php";
    ?>

    <script>
        var callMsg = setInterval(msgContent, 200);

        function msgContent() {

            var r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if (r.readyState == 4) {
                    document.getElementById("msgContent").innerHTML = r.responseText;

                }
            };
            r.open("GET", "msgContentLoad.php", true);

            r.send();



        }

        function sendMsg(id) {


            var r = new XMLHttpRequest();

            var f = new FormData();
            f.append("id", id);
            f.append("content", content.value);

            r.onreadystatechange = function() {
                if (r.readyState == 4) {

                    content.value = "";
                }
            };

            r.open("POST", "sendMsgProcess.php", true);
            r.send(f);

        }
    </script>
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>
</body>


</html>