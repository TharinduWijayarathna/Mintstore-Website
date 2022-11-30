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
        <link rel="stylesheet" href="assets/custom/chat.css">
        <link rel="stylesheet" href="bootstrap.css">


    </head>

    <body class="bg-dark">
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
                                <strong class="text-danger fw-bold">Mint</strong><strong class="fw-bold">Store</strong>
                            </div>
                            <div class="brand-text brand-sm">
                                <strong class="text-danger fw-bold">M</strong><strong class="fw-bold">S</strong>
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
                    <li>
                        <a href="adminpanel.php"> <i class="fa fa-home"></i>Home </a>
                    </li>
                    <li>
                        <a href="manageusers.php"> <i class="fa fa-user"></i>Manage Users</a>
                    </li>
                    <li>
                        <a href="sellerproductview.php">
                            <i class="fa fa-files-o"></i>Manage Products</a>

                    </li>
                    <li>
                        <a href="addproduct.php">
                            <i class="fa fa-plus-circle"></i>Add Products
                        </a>
                    </li>
                    <li>
                        <a href="manageproducts.php"> <i class="fa fa-link"></i>Link New Items </a>
                    </li>
                    <li class="active">
                        <a href="messages.php"> <i class="fa fa-wechat"></i>Messages</a>
                    </li>
                    <li>
                        <a href="managetracking.php"> <i class="fa fa-table"></i>Tracking</a>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid bg-dark">
                <div class="row bg-dark">

                    <div class="card bg-dark" style="min-height: 600px;">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 col-xl-3 border-right bg-dark">

                                <div class="bg-dark text-white">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h1 class="p-2 text-white">Recent</h1>
                                            <!-- <input type="text" class="form-control my-3" placeholder="Search..."> -->
                                        </div>
                                    </div>
                                </div>
                                <div id="resent">


                                </div>


                                <hr class="d-block d-lg-none mt-1 mb-0">
                            </div>
                            <div class="col-12 col-lg-7 col-xl-9 bg-dark text-dark" style=" overflow-y: scroll; height: 520px;">

                                <div style="max-height: 450px;min-height: 350px;">
                                    <div class="position-relative" style="border-radius: 20px;">
                                        <div class=" px-4" id="msgContent">
                                            <!--Msg load area-->
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                        <div class="flex-grow-0 py-3 px-4 border-top bg-dark col-9 offset-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="content" placeholder="Type your message" style="height: 55px;">
                                <button class="btn btn-primary" onclick="sendMsg();">Send</button>
                            </div>
                        </div>
                    </div>


                </div>

            </div>




            <script>
                var callMsg = setInterval(msgContent, 200);
                var resentFun = setInterval(resent, 500);


                var currentEmail;

                function resent() {

                    var r = new XMLHttpRequest();
                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {
                            document.getElementById("resent").innerHTML = r.responseText;
                        }
                    };
                    r.open("GET", "aresentChat.php", true);
                    r.send();
                }

                function msgContent() {

                    if (currentEmail != null) {

                        var form = new FormData();
                        form.append("id", currentEmail);

                        var r = new XMLHttpRequest();
                        r.onreadystatechange = function() {
                            if (r.readyState == 4) {
                                document.getElementById("msgContent").innerHTML = r.responseText;

                            }
                        };
                        r.open("POST", "amsgContentLoad.php", true);

                        r.send(form);
                    }


                }

                var loadMessage = function loadMsg(id) {

                    console.log("abuwa");

                    clearInterval(resentFun);
                    clearInterval(callMsg);

                    currentEmail = id;

                    callMsg = setInterval(msgContent, 200);
                    resentFun = setInterval(resent, 500);
                    clearInterval(loadMessage);
                }

                function sendMsg() {

                    var content = document.getElementById("content");

                    var r = new XMLHttpRequest();

                    var f = new FormData();
                    f.append("id", currentEmail);
                    f.append("content", content.value);

                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {

                            content.value = "";
                        }
                    };

                    r.open("POST", "asendMsgProcess.php", true);
                    r.send(f);

                }
                var callMsg = setInterval(msgContent, 200);
                var resentFun = setInterval(resent, 500);


                var currentEmail;

                function resent() {

                    var r = new XMLHttpRequest();
                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {
                            document.getElementById("resent").innerHTML = r.responseText;
                        }
                    };
                    r.open("GET", "aresentChat.php", true);
                    r.send();
                }

                function msgContent() {

                    if (currentEmail != null) {

                        var form = new FormData();
                        form.append("id", currentEmail);

                        var r = new XMLHttpRequest();
                        r.onreadystatechange = function() {
                            if (r.readyState == 4) {
                                document.getElementById("msgContent").innerHTML = r.responseText;

                            }
                        };
                        r.open("POST", "amsgContentLoad.php", true);

                        r.send(form);
                    }


                }

                var loadMessage = function loadMsg(id) {

                    console.log("abuwa");

                    clearInterval(resentFun);
                    clearInterval(callMsg);

                    currentEmail = id;

                    callMsg = setInterval(msgContent, 200);
                    resentFun = setInterval(resent, 500);
                    clearInterval(loadMessage);
                }

                function sendMsg() {

                    var content = document.getElementById("content");

                    var r = new XMLHttpRequest();

                    var f = new FormData();
                    f.append("id", currentEmail);
                    f.append("content", content.value);

                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {

                            content.value = "";
                        }
                    };

                    r.open("POST", "asendMsgProcess.php", true);
                    r.send(f);

                }
            </script>
            <script src="Admin/jquery.min.js"></script>
            <script src="Admin/bootstrap.min.js"></script>
            <script src="Admin/front.js"></script>
            <script src="script.js"></script>
    </body>

    </html>
<?php
}
?>