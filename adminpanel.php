<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {

?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Mintstore | AdminPanel</title>

    <link rel="icon" href="assets/images/logo/main.png" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="Admin/bootstrap.min.css" />
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="Admin/font-awesome/css/font-awesome.min.css" />
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="Admin/font.css" />
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="Admin/style.default.css" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="Admin/custom.css" />

  </head>

  <body>
    <header class="header">
      <nav class="navbar navbar-expand-lg">

        <div class="
            container-fluid
            d-flex
            align-items-center
            justify-content-between
          ">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="adminpanel.php" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase">
                <strong class="text-primary">Mint</strong><strong>Store</strong>
              </div>
              <div class="brand-text brand-sm">
                <strong class="text-primary">M</strong><strong>S</strong>
              </div>
            </a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle">
              <i class="fa fa-long-arrow-left"></i>
            </button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">


            <!-- Log out -->
            <div class="list-inline-item logout">
              <a href="adminlogout.php" class="nav-link">Logout <i class="fa fa-sign-out"></i></a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="title">
            <h1 class="h6"><?php echo $_SESSION["a"]["fname"] . " " . $_SESSION["a"]["lname"]; ?></h1>
            <p>Admin</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class="active">
            <a href="adminpanel.php"> <i class="fa fa-home"></i>Home </a>
          </li>
          <li>
            <a href="manageusers.php"> <i class="fa fa-user"></i>Manage Users </a>
          </li>
          <li>
            <a href="sellerproductview.php">
              <i class="fa fa-files-o"></i>Manage Products
            </a>
          </li>
          <li>
            <a href="addproduct.php">
              <i class="fa fa-plus-circle"></i>Add Products
            </a>
          </li>
          <li>
            <a href="manageproducts.php"> <i class="fa fa-link"></i>Link New Items </a>
          </li>
          <li>
            <a href="messages.php"> <i class="fa fa-wechat"></i>Messages</a>
          </li>
          <li>
            <a href="managetracking.php"> <i class="fa fa-table"></i>Tracking</a>
          </li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
            <?php

            $today = date("Y-m-d");
            $thismonth = date("m");
            $thisyear = date("Y");

            $a = 0;
            $b = 0;
            $c = 0;
            $e = 0;
            $f = 0;

            $invoicers = Database::search("SELECT * FROM `invoice`");
            $in = $invoicers->num_rows;

            for ($x = 0; $x < $in; $x++) {

              $ir = $invoicers->fetch_assoc();

              $f = $f + $ir["qty"];

              $d = $ir["date"];

              $splitedate = explode(" ", $d);
              $pdate = $splitedate[0];

              if ($pdate == $today) {
                $a = $a + $ir["total"];
                $c = $c + $ir["qty"];
              }

              $splitemonth = explode("-", $pdate);
              $pyear = $splitemonth[0];
              $pmonth = $splitemonth[1];

              if ($pyear == $thisyear) {
                if ($pmonth == $thismonth) {
                  $b = $b + $ir["total"];
                  $e = $e + $ir["qty"];
                }
              }
            }

            ?>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block">
                  <div class="
                      progress-details
                      d-flex
                      align-items-end
                      justify-content-between
                    ">
                    <div class="title">
                      <div class="icon"><i class="fa fa-user-circle"></i></div>
                      <?php

                      $usersrs = Database::search("SELECT * FROM `user`");
                      $un = $usersrs->num_rows;

                      ?>
                      <strong>Total Clients</strong>
                      <div class="number dashtext-1"><?php echo $un; ?> Clients</div>
                    </div>

                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block">
                  <div class="
                      progress-details
                      d-flex
                      align-items-end
                      justify-content-between
                    ">
                    <div class="title">
                      <div class="icon"><i class="fa fa-tablet"></i></div>
                      <strong>Today sold items</strong>
                      <div class="number dashtext-2"><?php echo $c; ?> Items</div>
                    </div>

                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block">
                  <div class="
                      progress-details
                      d-flex
                      align-items-end
                      justify-content-between
                    ">
                    <div class="title">
                      <div class="icon"><i class="fa fa-tag"></i></div>
                      <strong>Monthly sold items</strong>
                      <div class="number dashtext-3"><?php echo $e; ?> Items</div>
                    </div>

                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block">
                  <div class="
                      progress-details
                      d-flex
                      align-items-end
                      justify-content-between
                    ">
                    <div class="title">
                      <div class="icon"><i class="fa fa-cart-plus"></i></div>
                      <strong>Total Sold Items</strong>
                      <div class="number dashtext-4"><?php echo $f; ?> Items</div>
                    </div>

                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block">
                  <div class="
                      progress-details
                      d-flex
                      align-items-end
                      justify-content-between
                    ">
                    <div class="title">
                      <div class="icon">
                        <i class="fa fa-google-wallet"></i>
                      </div>
                      <strong>Total Monthly Earnings</strong>
                      <div class="number dashtext-6">Rs. <?php echo $b; ?> .00</div>
                    </div>

                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-6"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block">
                  <div class="
                      progress-details
                      d-flex
                      align-items-end
                      justify-content-between
                    ">
                    <div class="title">
                      <div class="icon"><i class="fa fa-money"></i></div>
                      <strong>Total Daily Earnings</strong>
                      <div class="number dashtext-5">Rs. <?php echo $a; ?> .00</div>
                    </div>

                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-5"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php

        $startdate = new DateTime("2021-11-05 00:00:00");

        $tdate = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");

        $tdate->setTimezone($tz);
        $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));

        $difference = $endDate->diff($startdate);

        ?>

        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="stats-2-block block d-flex">
                  <div class="stats-2 d-flex">
                    <div style="margin-top: 2px;"><i class="fa fa-clock-o"></i>&nbsp;</div>


                    <div class="stats-2-content">
                      <h3 class="d-block">Total Active Time</h3>
                      <span class="d-none">Date : <span id="days" class="d-none"></span></span>
                      <div class="row"> <span class="d-block"><?php

                                                              echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " . $difference->format('%d') . " Date "
                                                              // $difference->format('%H') . " Hours " . $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";

                                                              ?>
                        </span>
                        &nbsp;<span class="d-block"><i class="fa fa-arrows-v"></i> Hours : <span id="hours"></span></span>
                        &nbsp;<span class="d-block">Minutes : <span id="minutes"></span></span>
                        &nbsp;<span class="d-block">Secondes : <span id="seconds"></span></span>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="stats-3-block block d-flex">
                  <div class="stats-3">
                    <h3 class="d-block">Mostly Sold Item</h3>
                    <?php
                    // $selltoday = date("Y-m-d");

                    // echo $selltoday;

                    $productrow;

                    $freq = Database::search("SELECT `qty`,`product_id`, COUNT(`product_id`) AS `value_occurrence` FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY `value_occurrence` DESC LIMIT 1");

                    if ($freq->num_rows == 1) {

                      $freqrow = $freq->fetch_assoc();


                    ?>

                      <?php
                      $product = Database::search("SELECT * FROM `product` WHERE `id`='" . $freqrow["product_id"] . "'");
                      $productrow = $product->fetch_assoc();
                      ?>

                      <span class="d-block"><?php echo $productrow["title"] ?></span>

                      <div class="progress progress-template progress-small">
                        <div role="progressbar" style="width: 35%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="
                          progress-bar progress-bar-template progress-bar-small
                          dashbg-1
                        "></div>

                      </div>
                      <div>
                        <?php
                        $imgrow = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $freqrow["product_id"] . "' LIMIT 1");
                        $img = $imgrow->fetch_assoc();
                        ?>
                        <img src="images/product_img/<?php echo $img["code"]; ?>" class="img-fluid rounded mt-3" style="height: 100px;">

                      </div>
                      <?php

                      $pc = Database::search("SELECT COUNT(`id`) AS total FROM `invoice` WHERE `product_id`= '" . $freqrow["product_id"] . "' AND `date` LIKE '%" . $today . "%'");
                      $prs = $pc->fetch_assoc();

                      ?>
                  </div>
                  <div class="stats-3 d-flex justify-content-between text-center">
                    <div class="mt-4">
                      <h4 class="d-block strong-sm">Items Sold : <?php echo $prs['total']; ?> Items</h4>
                    </div>



                  </div>
                  <div class="stats-3 d-flex justify-content-between text-center">

                    <div class="mt-4">
                      <h4 class="d-block strong-sm">Price : Rs. <?php echo $productrow["price"] ?> .00</h4>
                    </div>


                  </div>
                </div>
              <?php
                    } else {
              ?>

                <span class="d-block">No Item Sold</span>
                <div class="progress progress-template progress-small">
                  <div role="progressbar" style="width: 35%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="
                          progress-bar progress-bar-template progress-bar-small
                          dashbg-1
                        "></div>
                </div>
              </div>
              <div class="stats-3 d-flex justify-content-between text-center">
                <div class="mt-3">
                  <h4 class="d-block strong-sm">Empty</h4>
                </div>
                <div class="mt-3">
                  <h4 class="d-block strong-sm">Empty</h4>
                </div>
              </div>
            </div>
          <?php
                    }
          ?>
          </div>
      </div>
    </div>
    </section>

    <section class="no-padding-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="stats-2-block block d-flex">
              <div class="stats-2 d-flex">
                <div class="stats-2-arrow">
                  <i class="fa fa-caret-down"></i>
                </div>
                <div class="stats-2-content">
                  <h3 class="d-block">Selling History</h3>
                  <div class="row">
                    <div class="col-12 col-lg-6"> <span class="d-block">
                        From Date:
                        <input class="form-control mt-2" type="date" id="fromdate"></div>
                    </span>
                    <div class="col-12 col-lg-6""> <span class=" d-block">
                      To Date:
                      <input class="form-control mt-2" type="date" id="todate">
                      </span>
                    </div>

                  </div>

                </div>

              </div>

              <div class="col-6 col-lg-6">
                <span class="d-none d-lg-block">Click to See Sellings</span>
                <br>

                <a id="historylink" class="btn btn-dark mt-4" onclick="dailyselling();">View Sellings</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    </div>
    </div>
    <!-- JavaScript files-->
    <script>
      const finaleDate = new Date("October 28, 2021 00:00:00").getTime();

      const timer = () => {
        const now = new Date().getTime();
        let diff = finaleDate + now;
        if (diff < 0) {
          document.querySelector('.alert').style.display = 'block';
          document.querySelector('.container').style.display = 'none';
        }

        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
        let seconds = Math.floor(diff % (1000 * 60) / 1000);

        days <= 99 ? days = `0${days}` : days;
        days <= 9 ? days = `00${days}` : days;
        hours <= 9 ? hours = `0${hours}` : hours;
        minutes <= 9 ? minutes = `0${minutes}` : minutes;
        seconds <= 9 ? seconds = `0${seconds}` : seconds;

        document.querySelector('#days').textContent = days;
        document.querySelector('#hours').textContent = hours;
        document.querySelector('#minutes').textContent = minutes;
        document.querySelector('#seconds').textContent = seconds;

      }
      timer();
      setInterval(timer, 1000);
    </script>
   

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="Admin/jquery.min.js"></script>
    <script src="Admin/bootstrap.min.js"></script>
    <script src="Admin/front.js"></script>
    <script src="script.js"></script>
  </body>

  </html>
<?php
}
?>