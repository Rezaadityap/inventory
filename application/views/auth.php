<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        Login | IPP
    </title>
    <!-- loader-->
    <link href="<?= base_url() ?>assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="<?= base_url() ?>assets/images/icon.png" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="<?= base_url() ?>assets/css/app-style.css" rel="stylesheet" />
    <!-- SWAL -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/swal/sweetalert2.min.css">

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <?php if ($this->session->flashdata('pesanError')) { ?>
            <div class="dataFlash" data-flashdata="<?php echo $this->session->flashdata('pesanError'); ?>"></div>
        <?php } ?>
        <?php if ($this->session->flashdata('pesanSukses')) { ?>
            <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
        <?php } ?>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="assets/images/logo.png" style="width: 30%" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Login</div>
                    <form action="<?= base_url('auth/login') ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Nip</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" name="nip" id="exampleInputUsername"
                                    class="form-control input-shadow" placeholder="Masukkan NIP" required>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" name="password" id="exampleInputPassword"
                                    class="form-control input-shadow" placeholder="Masukkan Password" required>
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                            <span style="color: salmon; font-size: small;">*Gunakan tanggal lahir 0000-00-00</span>
                        </div>
                        <center>
                            <div class="g-recaptcha" data-sitekey="6LfPnWwpAAAAADItndeSJjE4qk4CR6esOM4mx2bq"></div>
                        </center>
                        <button type="submit" class="btn btn-light btn-block mt-2">Masuk</button>
                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-white mb-0">&copy; Copyright by RAP 2024</p>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- sidebar-menu js -->
    <script src="<?= base_url() ?>assets/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="<?= base_url() ?>assets/js/app-script.js"></script>
    <!-- Captcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- SWAL -->
    <script src="<?php echo base_url() ?>assets/swal/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/swal/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/swal/myscript.js"></script>

</body>

</html>