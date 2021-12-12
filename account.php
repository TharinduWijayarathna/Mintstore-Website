<?php
session_start();

require "connection.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>MintStore | Account</title>

    <link rel="icon" href="assets/images/logo/main.png" />


    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>

<body>
    <?php
    require "header.php";

    if (isset($_SESSION["user"])) {
    ?>
        <div id="load">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li>&nbsp;</li>
                </ol>
            </nav>

            <!-- ...:::: Start Account Dashboard Section:::... -->
            <div class="account-dashboard mt-7">
                <div class="container">
                    <div class="row mb-9 mt-9">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <!-- Nav tabs -->
                            <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                                <ul role="tablist" class="nav flex-column dashboard-list">

                                    <li><a href="#account-details" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover mt-2">Account details</a>
                                    <li><a href="logout.php" class="nav-link btn btn-block btn-md btn-black-default-hover mt-2">logout</a></li>
                                    <li><a href="#" onclick="deleteuseraccount();" class="nav-link btn btn-block btn-md btn-black-default-hover mt-2">Delete Your Account</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">

                                <div class="tab-pane fade" id="account-details">
                                    <h3>Account details </h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <?php

                                                $usinfo = $_SESSION["user"];
                                                ?>
                                                <div>
                                                    <p>Update Your Profile Details</a></p>
                                                    <br>
                                                    <div class="default-form-box mb-20">
                                                        <label>First Name</label>
                                                        <input type="text" name="first-name" id="fname" value="<?php echo $usinfo["fname"] ?>">
                                                    </div>
                                                    <div class="default-form-box mb-20">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last-name" id="lname" value="<?php echo $usinfo["lname"] ?>">
                                                    </div>
                                                    <div class="default-form-box mb-20">
                                                        <label>Mobile</label>
                                                        <input type="text" id="mobile" name="mobile" value="<?php echo $usinfo["mobile"] ?>">
                                                    </div>
                                                    <div class="default-form-box mb-20">
                                                        <label>Email</label>
                                                        <input type="text" id="email" name="email-name" value="<?php echo $usinfo["email"] ?>" disabled>
                                                    </div>
                                                    <div class="default-form-box mb-20">
                                                        <label>Password</label>
                                                        <input type="text" name="user-password" value="<?php echo $usinfo["password"] ?>" disabled>
                                                    </div>
                                                    <div class="default-form-box mb-20">
                                                        <label>Registered Date & Time</label>
                                                        <input type="text" name="reg-date" value="<?php echo $usinfo["register_date"] ?>" disabled>
                                                    </div>
                                                    <?php

                                                    $usermail = $_SESSION["user"]["email"];
                                                    $addressrs = Database::search("SELECT * FROM  user_has_address WHERE user_email='" . $usermail . "'");
                                                    $n = $addressrs->num_rows;

                                                    if ($n == 1) {

                                                        $d = $addressrs->fetch_assoc();

                                                    ?>
                                                        <div class="default-form-box mb-20">
                                                            <label>Address Line 1</label>
                                                            <input type="text" id="line1" name="add-1" value="<?php echo $d["line1"] ?>">
                                                        </div>
                                                        <br>
                                                        <div class="default-form-box mb-20">
                                                            <label>Address Line 2</label>
                                                            <input type="text" id="line2" name="add-2" value="<?php echo $d["line2"] ?>">
                                                        </div>
                                                        <br>
                                                        <div class="default-form-box mb-20 col-4">
                                                            <label>Your Province</label>
                                                            <?php

                                                            $locationid = $d["location_id"];

                                                            $proid = Database::search("SELECT `province_id` FROM `location` WHERE `id`='" . $locationid . "'");
                                                            $prors = $proid->fetch_assoc();

                                                            $profind = Database::search("SELECT * FROM  province  WHERE id='" . $prors["province_id"] . "'");
                                                            $prodatars = $profind->fetch_assoc();

                                                            ?>


                                                            <select class="form-select" id="province">
                                                                <option value="<?php echo $prodatars["id"]; ?>"><?php echo $prodatars["name"]; ?></option>
                                                                <?php
                                                                $qprovince = Database::search("SELECT * FROM `province` WHERE `id`!='" . $prodatars['id'] . "'");
                                                                $prows = $qprovince->num_rows;
                                                                for ($x = 0; $x < $prows; $x++) {
                                                                    $allprovince = $qprovince->fetch_assoc();

                                                                    // if ($prodatars["id"] != $allprovince["id"]) {
                                                                ?>
                                                                    <option value="<?php echo $allprovince["id"]; ?>"><?php echo $allprovince["name"]; ?></option>

                                                                <?php
                                                                    // }
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="default-form-box mb-20 col-4">
                                                            <label>Your District</label>
                                                            <?php

                                                            $disid = Database::search("SELECT `district_id` FROM `location` WHERE `id`='" . $locationid . "'");
                                                            $disrs = $disid->fetch_assoc();

                                                            $disfind = Database::search("SELECT * FROM  district  WHERE id='" . $disrs["district_id"] . "'");
                                                            $disdatars = $disfind->fetch_assoc();

                                                            ?>


                                                            <select class="form-select col-4" id="district">
                                                                <option value="<?php echo $disdatars["id"]; ?>"><?php echo $disdatars["name"]; ?></option>
                                                                <?php
                                                                $qdistrict = Database::search("SELECT * FROM `district` WHERE `id`!='" . $disdatars['id'] . "'");
                                                                $drows = $qdistrict->num_rows;
                                                                for ($x = 0; $x < $drows; $x++) {
                                                                    $alldistrict = $qdistrict->fetch_assoc();

                                                                    // if ($disdatars["id"] != $alldistrict["id"]) {
                                                                ?>
                                                                    <option value="<?php echo $alldistrict["id"]; ?>"><?php echo $alldistrict["name"]; ?></option>

                                                                <?php
                                                                    // }
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="default-form-box mb-20 col-4">
                                                            <label>Your City</label>
                                                            <?php

                                                            $locate = Database::search("SELECT `city_id` FROM `location` WHERE `id`='" . $locationid . "'");
                                                            $locrs = $locate->fetch_assoc();

                                                            $ucity = Database::search("SELECT * FROM  city  WHERE id='" . $locrs["city_id"] . "'");
                                                            $c = $ucity->fetch_assoc();

                                                            ?>


                                                            <select class="form-select col-4" id="city">
                                                                <option value="<?php echo $c["id"]; ?>"><?php echo $c["name"]; ?></option>
                                                                <?php
                                                                $qcity = Database::search("SELECT * FROM `city` WHERE `id`!='" . $c['id'] . "'");
                                                                $crows = $qcity->num_rows;
                                                                for ($x = 0; $x < $crows; $x++) {
                                                                    $allcity = $qcity->fetch_assoc();

                                                                    // if ($c["id"] != $allcity["id"]) {

                                                                ?>
                                                                    <option value="<?php echo $allcity["id"]; ?>"><?php echo $allcity["name"]; ?></option>


                                                                <?php
                                                                    // }
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="default-form-box mb-20 col-4">
                                                            <label>Postal Code</label>
                                                            <input type="text" name="code" id="postalcode" value="<?php echo $c["postal_code"] ?>">
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="default-form-box mb-20">
                                                            <label>Address Line 1</label>
                                                            <input type="text" id="line1" name="add-1">
                                                        </div>
                                                        <div class="default-form-box mb-20">
                                                            <label>Address Line 2</label>
                                                            <input type="text" id="line2" name="add-2">
                                                        </div>



                                                        <div class="default-form-box mb-20 col-4">
                                                            <label>Your Province</label>
                                                            <select class="form-select" id="province">
                                                                <option value="0">Select Province</option>
                                                                <?php
                                                                $newprovince = Database::search("SELECT * FROM `province`");
                                                                $newprovincerows = $newprovince->num_rows;
                                                                for ($x = 0; $x < $newprovincerows; $x++) {
                                                                    $newprovincedata = $newprovince->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $newprovincedata["id"]; ?>"><?php echo $newprovincedata["name"]; ?></option>


                                                                <?php
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="default-form-box mb-20 col-4">
                                                            <label>Your District</label>
                                                            <select class="form-select" id="district">

                                                                <option value="0">Select District</option>
                                                                <?php
                                                                $newdistrict = Database::search("SELECT * FROM `district`;");
                                                                $newdistrictrows = $newdistrict->num_rows;
                                                                for ($x = 0; $x < $newdistrictrows; $x++) {
                                                                    $newdistrictdata = $newdistrict->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $newdistrictdata["id"]; ?>"><?php echo $newdistrictdata["name"]; ?></option>


                                                                <?php
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                        <div class="default-form-box mb-20 col-4">
                                                            <label>Your City</label>
                                                            <select class="form-select" id="city">
                                                                <option value="0">Select City</option>
                                                                <?php
                                                                $newcity = Database::search("SELECT * FROM `city`;");
                                                                $newcityrows = $newcity->num_rows;
                                                                for ($x = 0; $x < $newcityrows; $x++) {
                                                                    $newcitydata = $newcity->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $newcitydata["id"]; ?>"><?php echo $newcitydata["name"]; ?></option>


                                                                <?php
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="default-form-box mb-20 col-4">
                                                            <label>Postal Code</label>
                                                            <input id="postalcode" type="text" class="form-control" placeholder="Enter Postal Code" />
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <br />

                                                    <div class="mt-3">
                                                        <button class="btn btn-md btn-black-default-hover" onclick="updateProfile();">Update Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="deleteacc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Delete Account</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Are you sure about this</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-golden" onclick="deleteaccount();">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

            <!-- Modal -->
            <div class="modal fade" id="md" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Alert</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="inner">

                        </div>
                        <div class="modal-footer">
                            <button onclick="refreshacc();" type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Close</button>
                            
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

    <?php

    } else {
    ?>
        <script>
            window.location = "Signin_and_signup.php";
        </script>
    <?php
    }

    ?>



    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="script.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>