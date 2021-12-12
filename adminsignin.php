
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mintstore | Admin Signin</title>

    <link rel="icon" href="assets/images/logo/main.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="assets/custom/style.css" />
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>

<body style="background-color: #74EBD5;background-image:linear-gradient(to bottom, #ffffcc 0%, #ccffff 100%);min-height: 100vh;">

    <div class="container-fluid min-vh-100 d-flex justify-content-center">

        <div class="row align-content-center">

            <!--heder-->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <h2 class="text-center fw-bold">Hi, Welcome to MintStore Admins</h2>
                    </div>
                </div>
            </div>
            <!--heder-->

            <div class="col-12 px-5">
                <div class="row">

                    <div class="col-6 d-none d-lg-block background" style="min-height: 20rem;"></div>

                    <div class="col-12 col-lg-6 d-block my-auto">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2">Sign In To Your Account</p>
                            </div>
                            <div class="col-12">

                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" id="e" />
                            </div>

                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 d-grid">
                                <button class="btn btn-golden" onclick="adminverification();">Send Verification Code To Login</button>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 d-grid">
                                <button class="btn btn-black-default-hover">Back to User's Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="verficationmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Wnter the verfication code you got by an Email.</label>
                            <input type="text" class="form-control" id="v">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary text-white" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--footer-->
            <div class="col-12 d-none d-md-block fixed-bottom">
                <p class="text-center">&copy; 2021 Mintstore.lk All Rights Reserved</p>
            </div>
            <!--footer-->

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>